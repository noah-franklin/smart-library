Yitzhak Alvarez 2021

			Instructions for Reorganizing Images (Library Project)

Student		Location of Image SOURCE		Location of Image DESTINATION
		(where to GET the images)		(where to GET the images)
		/var/www/html/vlib/sdata/		/var/www/html/vlib/udata/
Yitzhak		8-angel and 3-tahir		8-angel-yitzhak and 3-tahir-yitzhak

For this portion of the project, I was tasked to reorganize the images to their corresponding	 folders. In order to accomplish this task, I had to follow the instructions that was provided by Professor Pham:

1. Log in to the A server for the LIBRARY Data:
	1a)Must install Cisco VPN client (search at newpaltz.edu) on your computer first, then login to our VPN (regular username/password).
	1b)Then, use Win_SCP or FileZilla to login to the SERVER, its address is a.cs.newpaltz.edu
	same username and password as for Blackboard
2. Download (transfer F5) the folders assigned to you from A server to your computer:
	2a) GO to the /sdata/ folder at the A server
	/var/www/html/vlib/sdata
	2b) Create a folder for this project called /MyImageSorting/ then INSIDE this folder create a 				 
	subfolder called /mysdata/ at your computer. Then, DOWNLOAD (F5, still keep the original copy)
	the folder assigned to you from the A server to this new subfolder at your computer.
3. Prepare the DESTINATION/TARGET folder at your computer:
	Download and extract the attached folder (in a ZIP file) next to /my-sdata/, change its name from
	/0-sampleTarget/ to your assigned target folder name.
3. SCAN through all subfolders in the SOURCE folder /my-sdata/ and MOVE (drag and drop) images to the 
right subfolder in the DESTINATION/TARGET.

OPEN a window for the SOURCE folder and another window for the DESTINATION/TARGET folder
(both at your computer). In each window: click on VIEW then LARGE ICONS to show the contents of images.
Then, go through each subfolder and SORT/MOVE (drag and drop) images from the SOURCE to the correct
subfolder in the DESTINATION/TARGET based on what you see in each image.

** IF you see images containing a NEW character in SOURSE but it doesn’t have a corresponding subfolder present in DESTINATION/TARGET then create a new subfolder for it in DESTINATION/TARGET. IF you see images containing a unrecognized/strange symbol in SOURSE then just ignore it.** 

4. TRANSFER the sorting results to the A server at /var/www/html/vlib/udata 
	After you are done with sorting all images in the folders assigned to you: please upload (F5) the 
	whole DESTINATION/TARGET subfolder (example: 1-amit-leo) in your computer to the target folder at 
	the A server: /var/www/html/vlib/udata