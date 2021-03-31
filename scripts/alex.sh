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
         mv "row (1)" row1
         mv "row (2)" row2
         mv "row (3)" row3
         mv "row (4)" row4
         mv "row (5)" row5
         mv "row (6)" row6
         mv "row (7)" row7
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
