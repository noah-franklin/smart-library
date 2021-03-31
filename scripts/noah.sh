#!/bin/sh

do_the_stuff() {
    # Set up variables
    # The round variables are needed to round UP
    # This gets how many pictures are in the folder and divides it by
    # 3 to get how many rows we need, then divide number of rows by 7 
    # to get how many sections we need
    numFiles=$(ls | wc -l)
    roundRows=$(expr $numFiles + 2)
    numRows=$(expr $roundRows / 3)
    roundSections=$(expr $numRows + 6)
    numSections=$(expr $roundSections / 7)


    # Functions
    create_rows() {
        
            rowcounter=1
            while [ "$rowcounter" != 8 ]
                do
                    
                    if [ "$numRows" != 0 ]
                        then
                            mkdir row$rowcounter
                            numRows=$(expr "$numRows" - 1)
                            rowcounter=$(expr "$rowcounter" + 1)
                        else
                            return
                    fi
                done
    }

    create_sections() {
        counter=1

        while [ "$counter" != $(expr "$numSections" + 1) ]
            do
                mkdir "section$counter"
                cd section$counter
                create_rows
                cd ..
                counter=$(expr "$counter" + 1)
            done
    }

     move_pictures() {
        currentSection=1
        currentRow=1
        temp=3
        for f in *.jpg
            do
                echo "$f"
                if [ "$temp" != 0 ]
                    then 
                        mv $f section$currentSection/row$currentRow
                        temp=$(expr "$temp" - 1)
                    else
                        echo $currentSection
                        echo $numSections
                        if [ "$currentSection" = "$numSections" ]
                            then    
                                currentSection=1
                                currentRow=$(expr "$currentRow" + 1)
                            else
                                echo $create_sections
                                currentSection=$(expr "$currentSection" + 1)
                        fi
                        if [ -d "section$currentSection/row$currentRow" ]
                            then
                                echo "Found Directory"
                            else
                                currentSection=1
                                currentRow=$(expr "$currentRow" + 1)
                        fi
                        mv $f section$currentSection/row$currentRow                                       
                        temp=2    
                     
                fi

            done

    }

    # Console
    pwd
    echo "Number of files: $numFiles"
    echo "Rows needed: $numRows"
    echo "Sections needed: $numSections"

    create_sections
    move_pictures

}
cd b
do_the_stuff
cd ..
cd a
do_the_stuff