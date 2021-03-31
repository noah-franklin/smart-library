#!/bin/sh
echo "How many sections?"
read INPUT
alias goback="cd .."

rename_rows() {
    SECTIONS=$INPUT
   
     while [ "$SECTIONS" != 0 ]
     do
         cd section$SECTIONS
         pwd
         mv "Row 1" row1
         mv "Row 2" row2
         mv "Row 3" row3
         mv "Row 4" row4
         mv "Row 5" row5
         mv "Row 6" row6
         mv "Row 7" row7
         goback
         SECTIONS=`expr "$SECTIONS" - 1`
     done
}
alias goa="cd a"

alias gob="cd b"
goa
rename_rows
goback
gob
rename_rows
