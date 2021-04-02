import os

directory = './'

def get_stuff(directory, naming):
    for file in os.listdir(directory):
        if file.startswith(".") or file.endswith(".py"):
            continue
        else:
            print("\n" + naming + ": " + file)
            if file.endswith(".jpg"):
                
                continue
            else:
                get_stuff(directory+file+"/", "Sub Folders")


get_stuff(directory, "#-NAME")
