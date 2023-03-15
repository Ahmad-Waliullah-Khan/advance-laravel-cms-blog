## Advance CMS/Blog Web Application using Laravel

A blog/cms project in Laravel

Requirement for the application :

```php

Goal : Build a simple blog with a CMS

The blog contains the following sections

1. Users include three types of users with the type of the administrator, authors and users

a - Administrator: Full site control
b - Authors: Only the ability to edit and add contents, register and edit categories, register and edit tags
c - Users: can only register and edit their profile

All users have these fields: name, date of birth, email and phone number, and there is also an access level system that can define roles .
2. Content that includes the image fields, the title , the text of the article, the abstract and the date of creation and registration

Each content can have a category

Each content can have one or more tags
3. Category content include names fields
4. The tag only contains the name
5. Site settings only include site name, logo and font
6. Part to determine the level of access
The program does not need to have a great graphics, but it's a good interface and it's simple and beautiful to focus more on features .

```

### Instruction :
- **Download the code**
- **Create a an empty database**
- **Import the file found in "\_SQL\_" folder in the database**
- **Rename the .env.example file to .env**
- **Enter database credentials in the .env file**
- **Go to public folder and delete the "Storage" symlink**
- **Open terminal in the projet directory and type " php artisan storage:link " to create new symlink**
- **Login with the admin credentials : email - admin@koolcms.om | password - 654321**
- **That's it. Surf around the app and please do suggest improvements.**



- Built by [Ahmad W Khan](http://AhmadWKhan.com)
