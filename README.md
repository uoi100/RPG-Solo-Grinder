# RPG-Solo-Grinder - Assignment 2
### Instructions
>+ import projectrpgsologrinder.sql into the "projectrpgsologrinder" database.
>+ use the Username: "Admin" and the Password: "admin" to login in the login page.

>>+ An alternative would be to just go to application/admin page instead.

###Controllers
>####Categories
> Categories are responsible for generating blog content based on their respective categories. The blogs are listed in descending order, basically newest to oldest
>+ Home
>+ News
>+ Games
>+ Anime
>+ Projects
>+ Stream
>

>#### Login / Admin
>+ Login

>>+ Responsible for allowing the user to login onto his account.

>+ Admin

>>+ If the person's account is an admin account, he/she will be taken the admin page. Which will allow him/her to create/modify/delete blog entries.

>#### Models
>+ userbase

>>+ Contains Username and Password information in the SQL

>+ blogbase

>>+ Contains Blog information for each respective category
