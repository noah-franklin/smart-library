#!/usr/bin/python

i = 1
x = 1
while x < 5:
    y=1
    while y < 8:
        s = str(i)+"a.html"
        f = open(s, "w")
        f.write("<!DOCTYPE html>"+"\n")
        f.write("<html>"+"\n")
        f.write("<body>"+"\n"+"\n")
        f.write('<img src=	"http://a.cs.newpaltz.edu/vlib/idata/amit/c02/A/c02A_s'+str(x)+'_L'+str(y)+'-1.jpg" alt=	"Shelf Left" width=	"460" height=	"345">'+"\n"+"\n")
        f.write('<img src=	"http://a.cs.newpaltz.edu/vlib/idata/amit/c02/A/c02A_s'+str(x)+'_L'+str(y)+'-2.jpg" alt=	"Shelf Middle" width=	"460" height=	"345">'+"\n"+"\n")
        f.write('<img src=	"http://a.cs.newpaltz.edu/vlib/idata/amit/c02/A/c02A_s'+str(x)+'_L'+str(y)+'-3.jpg" alt=	"Shelf Right" width=	"460" height=	"345"><br>'+"\n"+"\n")
        f.write('<button onclick="goBack()">'+"\n")
        f.write("Go Back"+"\n")
        f.write("</button>"+"\n")
        f.write("<script>"+"\n")
        f.write("function goBack() {"+"\n")
        f.write("  window.history.back();"+"\n")
        f.write("}"+"\n")
        f.write("</script>"+"\n"+"\n")
        f.write("</body>"+"\n")
        f.write("</html>")
        f.close()
        i += 1
        y += 1
    x += 1
    
i = 1
x = 1
while x < 5:
    y=1
    while y < 8:
        s = str(i)+"b.html"
        f = open(s, "w")
        f.write("<!DOCTYPE html>"+"\n")
        f.write("<html>"+"\n")
        f.write("<body>"+"\n"+"\n")
        f.write('<img src="http://a.cs.newpaltz.edu/vlib/idata/amit/c01/B/c01B_s'+str(x)+'_L'+str(y)+'-1.jpg" alt=	"Shelf Left" width=	"460" height=	"345">'+"\n"+"\n")
        f.write('<img src="http://a.cs.newpaltz.edu/vlib/idata/amit/c01/B/c01B_s'+str(x)+'_L'+str(y)+'-2.jpg" alt=	"Shelf Middle" width=	"460" height=	"345">'+"\n"+"\n")
        f.write('<img src="http://a.cs.newpaltz.edu/vlib/idata/amit/c01/B/c01B_s'+str(x)+'_L'+str(y)+'-3.jpg" alt=	"Shelf Right" width=	"460" height=	"345"><br>'+"\n"+"\n")
        f.write('<button onclick="goBack()">Go Back</button>'+"\n"+"\n")
        f.write("<script>"+"\n")
        f.write("function goBack() {"+"\n")
        f.write("  window.history.back();"+"\n")
        f.write("}"+"\n")
        f.write("</script>"+"\n"+"\n")
        f.write("</body>"+"\n")
        f.write("</html>")
        f.close()
        i += 1
        y += 1
    x += 1