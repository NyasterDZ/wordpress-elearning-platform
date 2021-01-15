# wordpress-elearning-plateform
A simple e-learning platform to share files and courses with students 
![enter image description here](https://nimbusweb.me/box/attachment/5091765/d7mfuntnqqywzvblfq2u/zs7eH2THMNSJJ6li/screenshot-localhost_8080-2021.01.15-19_29_24.png)

# Important

this theme uses the Template (**Genius Course - School Classes Institute HTML Template**)  that I already bought, so if you want to have a license for this theme, buy it from [this link](https://themeforest.net/item/genius-course-learning-course-html-template/21984716)   

# installation steps

 1. install wordpress (in your local machine or in your server)
 2. download the files of this project
 3. put the **eLearning** folder (the theme folder) in **wp-content/themes**
 4. put the **mu-plugins** folder in **wp-content**
 5. put the **contents** of the **plugins** folder **(that you have downloaded)** in the **plugins** folder
 6. there are 5 plugins, that you can install manually from your Control Panel:<br>
**Advanced Custom Fields**: We use the Advanced Custom Fields plugin to take full control of our WordPress edit screens & custom field data.<br>
 **Members**: to create roles and manage permissions <br>
**New User Approve**:  each registration must be accepted by an administrator <br>
**WP Avatar**:to change the profile picture<br>
**WP Online Users Stats**: to see which students are online <br>
7. Now, go to your **Control Board** and **activate** your theme in **Appearance/themes**
 8. In your **Control Board** go to **plugins/Installed Plugins** and activate all the plugins you have added
 9. go to **Members/Roles** and edit the **administrator** role:
 allow him to manage **Modules-Chapters-Courses-Videos** .<br>
 you will see that new options in your control panel are added
 10. add three new empty pages : home/blog/login.
 11. go to **Settings/Reading** than choose **a static page**:
 for **homepage** choose **home**, and **Posts page** choose **blog**
 12. go to **Custom Fields/Tools** then in **Import Field Groups** choose the json file **acf-export-2021-01-07.json**, click **import file**.
 13. go to **Settings/Permalinks** and choose **Post name** then save changes.
 14. Finally don't forget to activate the registrations in **Settings/General**
 # Explanation of usage

![enter image description here](https://nimbusweb.me/box/attachment/5091786/ytms2bbk6fffvlt6374o/gIabpw4vyb2lJF2A/screenshot-localhost_8080-2021.01.15-19_35_51.png)
First of all you start by creating courses. When you create a course you will find below a field to choose the course file (pdf or docx).
Next you will create the chapters, and each chapter contains a set of courses. When you create a chapter you will find below a field to associate the courses to this chapter. Finally you will create the module, and when you create a module you will find below a field to associate the chapters to this module.

# quick modifications
1. if you want to change something in the **navbar**, the responsible file is **header.php** in **wp-content/themes/elearning**
2. if you want to change something in the **footer**, the responsible file is **footer-fpage.php** in **wp-content/themes/elearning**
3. if you want to change something in the home page, the responsible file is **front-page.php** in **wp-content/themes/elearning**
4. If you want to change the name of the options (Module/Chapter/Course/Video), the responsible file is **gp-cpt.php** in **wp-content/mu-plugins** **(Be careful when you modify something in this file, I suggest you to read a little about Custom post in wordpress)**
5. the additional fields that appear below each creation form (i.e. Module, Chapter, Course, Video), you will find them in **Custom Fields/Field Groups**. 



 
 

