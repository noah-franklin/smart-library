import os

directory = './'


def get_stuff(directory, naming):
    files = os.listdir(directory)
    files.sort()
    
    for file in files:
        if file.startswith(".") or file.endswith(".py") or file.startswith("bookcases"):
            continue
        else:
            print("\n" + naming + ": " + file)
            if file.endswith(".jpg"):
                continue
            else:
                if (file.startswith("c")):
                    global parent
                    global shelf
                    shelf = file
                    parent = "./bookcases/"+file
                    os.mkdir(parent)

                if (file.startswith("a")):
                    global f
                    f = open(parent +"/a.html" , "w")
                    f.write("Shelf: "+shelf+"\nSide: a\n")

                if (file.startswith("b")):
                    global f
                    f = open(parent +"/b.html" , "w")
                    f.write("Shelf: "+shelf+"Side: b\n")

                if(file.startswith("s")):
                    f.write(file+"\n")
                if(file.startswith("r")):
                    f.write(file+"\n")
                    
                get_stuff(directory+file+"/", "Sub Folders")


get_stuff(directory, "#-Parent")
