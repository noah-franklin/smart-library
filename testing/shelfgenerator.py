import os

directory = './'


def get_stuff(directory, naming):
    files = os.listdir(directory)
    files.sort()
    print(files)
    for file in files:
        if file.startswith(".") or file.endswith(".py") or file.startswith("bookcases"):
            continue
        else:
            print("\n" + naming + ": " + file)
            if file.endswith(".jpg") and naming.startswith("Photos"):
               
                f.write('<img class="bookImg" src="http://a.cs.newpaltz.edu/vlib/idatabase/'+directory[2:]+file+'"'+' />')
            
            if file.endswith(".jpg"):
                continue
            if (file.startswith("c")):
                global parent
                global shelf
                shelf = file
                parent = "./bookcases/"+file
                os.mkdir(parent)
                get_stuff(directory+file+"/", "A or B")

            if (file.startswith("a")):
                global f
                f = open(parent +"/a.html" , "w")
                f.write('<head>\n')
                f.write('<link href="./css/bookShelf.css" rel="stylesheet" />\n')
                f.write('</head>\n')
                f.write("<h1>Shelf: "+shelf+"\nSide: a</h1>\n")
                f.write('<div class="container-fluid shelf">\n')
                f.write('<div class="row NOWRAPPLS">\n')
                get_stuff(directory+file+"/", "Sections")
                f.write("</div>\n")
                f.write("</div>\n")

            if (file.startswith("b")):
                global f
                f = open(parent +"/b.html" , "w")
                f.write('<head>\n')
                f.write('<link href="./css/bookShelf.css" rel="stylesheet" />\n')
                f.write('</head>\n')
                f.write("<h1>Shelf: "+shelf+"\nSide: b</h1>\n")
                f.write('<div class="container-fluid shelf">\n')
                f.write('<div class="row NOWRAPPLS">\n')
                get_stuff(directory+file+"/", "Sections")
                f.write("</div>\n")
                f.write("</div>\n")

            if(file.startswith("s")):
                    # f.write(file+"\n")
                f.write('<div class="col section">\n')
                get_stuff(directory+file+"/", "Rows")
                f.write("</div>\n")
            if(file.startswith("r")):
                    # f.write(file+"\n")
                f.write('<div class="rowStyle">\n')
                get_stuff(directory+file+"/", "Photos")
                f.write("</div>\n")
            if(file[0].isdigit()):
                global owner
                owner = file
                get_stuff(directory+file+"/", "Bookshelves")
                    
            # get_stuff(directory+file+"/", "Sub Folders")
                


get_stuff(directory, "#-Parent")
