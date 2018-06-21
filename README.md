# mini-blog

Build a mini-blog with PHP7 and MongoDB

Install MongoDB on Windows:
https://blog.csdn.net/a497785609/article/details/80563277

Windows php7 install MongoDB extension:
https://blog.csdn.net/weixin_36429334/article/details/73467830

    |-------admin
            |------index.php                    # Load corresponding frontend view to create/edit/view articles(admin)
            |------auth.php			                # Authetication module
    |-------view
            |------admin
                    |-------create.view.php     # Frontend view for creating a post(admin)
                    |-------edit.view.php	# Frontend view for editing a existing post(admin)
                    |-------dashboard.view.php	# Frontend view for the dashborad(admin)
            |------index.view.php	            	# Frontend view for post index(admin + guest)
            |------layout.php                   # Main layout shown for every action executed within the app
            |------post.view.php		            # Frontend view for a post
    |-------config.php                          # Define paramater database, url
    |-------app.php                             # Include multi-php files
    |-------db.php                        	    # Container class db 
    |-------index.php
    |-------post.php
    |-------static                              # Container css,js...
                |-----css
                |-----js
    |-------vendor				                      # Libraries

collections:
  posts
  comments
