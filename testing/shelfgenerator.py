import os

directory = './'

def get_stuff(directory, naming):
    for file in os.listdir(directory):
        if file.startswith(".") or file.endswith(".py") or file.startswith("bookcases"):
            continue
        else:
            print("\n" + naming + ": " + file)
            if file.endswith(".jpg"):
                continue
            else:
                if (file.startswith("c")):
                    f = open("./bookcases/"+file+".html", "w")
                get_stuff(directory+file+"/", "Sub Folders")


get_stuff(directory, "#-Parent")
