@echo on
  setlocal enabledelayedexpansion
  for /l %%x in (2,1,97) do (
     robocopy "C:\Users\Myles Barcelo\Desktop\f17-07\f20-v1\f20-Dynamic-Mapping\tables\concourseShelves\c01" "C:\Users\Myles Barcelo\Desktop\f17-07\f20-v1\f20-Dynamic-Mapping\tables\concourseShelves\c%%x" /E
 )

  endlocal