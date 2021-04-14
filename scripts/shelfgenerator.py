import os

directory = './'


def get_stuff(directory, naming):
    files = os.listdir(directory)
    files.sort()
    print(files)
    for file in files:
        if (file.startswith(".") or file.endswith(".py") or file.startswith("bookcases") 
        or file.startswith("zipped") or file.startswith("BackUpCopy") or file.endswith(".sh")
        or file.endswith(".txt") or file.endswith(".bat")):
            continue
        else:
            global f, x, parent, case, side, section, sectionPath, counter, owner
            print("\n" + naming + ": " + file)
            if file.endswith(".jpg") and naming.startswith("Photos"):
                # global f, x, 
                # global x
                f.write('<img class="bookImg" src="http://a.cs.newpaltz.edu/vlib/idatabase/'+directory[2:]+file+'"'+' />')
                x.write('<div class="col">')
                x.write('<img class="books" src="http://a.cs.newpaltz.edu/vlib/idatabase/'+directory[2:]+file+'"'+' usemap="bookmap'+str(counter)+'"/>')
                x.write('<map name="bookmap'+str(counter)+'">')
                x.write('<area shape="rect" coords="0,0,50,500" href="https://suny-new.primo.exlibrisgroup.com/permalink/01SUNY_NEW/5celm9/alma996664553604844" target="_blank"/>')
                x.write('<area shape="rect" coords="50,0,100,500" href="https://suny-new.primo.exlibrisgroup.com/permalink/01SUNY_NEW/5celm9/alma996664553604844" target="_blank"/>')
                x.write('<area shape="rect" coords="100,0,150,500" href="https://suny-new.primo.exlibrisgroup.com/permalink/01SUNY_NEW/5celm9/alma996664553604844" target="_blank"/>')
                x.write('<area shape="rect" coords="150,0,200,500" href="https://suny-new.primo.exlibrisgroup.com/permalink/01SUNY_NEW/5celm9/alma996664553604844" target="_blank"/>')
                x.write('<area shape="rect" coords="200,0,250,500" href="https://suny-new.primo.exlibrisgroup.com/permalink/01SUNY_NEW/5celm9/alma996664553604844" target="_blank"/>')
                x.write('<area shape="rect" coords="250,0,300,500" href="https://suny-new.primo.exlibrisgroup.com/permalink/01SUNY_NEW/5celm9/alma996664553604844" target="_blank"/>')
                x.write('<area shape="rect" coords="300,0,350,500" href="https://suny-new.primo.exlibrisgroup.com/permalink/01SUNY_NEW/5celm9/alma996664553604844" target="_blank"/>')
                x.write("</map>\n")
                x.write("</div>\n")
                counter = counter + 1
            if file.endswith(".jpg"):
                continue
            if (file.startswith("c")):
                # global parent
                # global case
                case = file
                parent = "./bookcases/"+file
                os.mkdir(parent)
                get_stuff(directory+file+"/", "A or B")

            if (file.startswith("a")):
                # global side
                
                side = 'a'
                os.mkdir(parent+"/a")
                f = open(parent +"/a.html" , "w")
                f.write('<head>\n')
                f.write('<link href="./css/bookCase.css" rel="stylesheet" />\n')
                f.write('</head>\n')
                # f.write("<h1>case: "+case+"\nSide: a</h1>\n")
                f.write('<div class="bookcaseInfo">\n')
                f.write('<span>Bookcase: <strong>'+case+'</strong></span>\n')
                f.write('<span>Side: <span class="aSide" onclick="getBookCase(\'' +case+'\',\'a\')">A</span> <span class="bSide" onclick="getBookCase(\'' +case+'\',\'b\')">B</span></span>\n')
                f.write("</div>\n")
                f.write('<div class="container-fluid case">\n')
                f.write('<div class="row NOWRAPPLS">\n')
                get_stuff(directory+file+"/", "Sections")
                f.write("</div>\n")
                f.write("</div>\n")

            if (file.startswith("b")):
                # global side
                
                side = 'b'
                os.mkdir(parent+"/b")
                f = open(parent +"/b.html" , "w")
                f.write('<head>\n')
                f.write('<link href="./css/bookCase.css" rel="stylesheet" />\n')
                f.write('</head>\n')
                # f.write("<h1>case: "+case+"\nSide: a</h1>\n")
                f.write('<div class="bookcaseInfo">\n')
                f.write('<span>Bookcase: <strong>'+case+'</strong></span>\n')
                f.write('<span>Side: <span class="aSide" onclick="getBookCase(\'' +case+'\',\'a\')">A</span> <span class="bSide" onclick="getBookCase(\'' +case+'\',\'b\')">B</span></span>\n')
                f.write("</div>\n")
                f.write('<div class="container-fluid case">\n')
                f.write('<div class="row NOWRAPPLS">\n')
                get_stuff(directory+file+"/", "Sections")
                f.write("</div>\n")
                f.write("</div>\n")

            if(file.startswith("s")):
                    # f.write(file+"\n")
                # global sectionPath
                # global section
                section = file
                sectionPath = parent+'/'+side+'/'+file
                os.mkdir(sectionPath)
        
                f.write('<div class="col section">\n')
                get_stuff(directory+file+"/", "Rows")
                f.write("</div>\n")
            if(file.startswith("r")):
                # global counter
                
                counter = 0
                    # f.write(file+"\n")
                f.write('<div class="rowStyle" onclick="getBookShelf(\''+sectionPath[1:]+'\',\''+file+'\')">\n')
                x = open(sectionPath+"/"+file+".html" , "w")
                x.write('<head>\n')
                x.write('<link href="./css/bookShelf.css" rel="stylesheet" />\n')
                x.write('</head>\n')
                x.write('<div class="bookcaseInfo">\n')
                x.write('<span>Section: <strong>'+section[-1]+'</strong></span>\n')
                x.write('<span>Bookcase: <strong>'+case+side+'</strong></span>\n')
                x.write("</div>\n")
                x.write('<div class="bookcaseInfo">\n')
                x.write('<span>Row: <strong>'+file[-1]+'</strong></span>\n')
                x.write('<span class="btn" onclick="getBookCase(\''+case+'\',\''+side+'\')">Go Back</span>\n')
                x.write("</div>\n")
                x.write('<div class="container-fluid">\n')
                x.write('<div class="shelf">\n')
                x.write('<div class="row">\n')
                get_stuff(directory+file+"/", "Photos")
                f.write("</div>\n")
                x.write("</div>\n")
                x.write("</div>\n")
                x.write("</div>\n")
            if(file[0].isdigit()):
                # global owner
                owner = file
                get_stuff(directory+file+"/", "Bookshelves")
                    
            # get_stuff(directory+file+"/", "Sub Folders")
                


get_stuff(directory, "#-Parent")
