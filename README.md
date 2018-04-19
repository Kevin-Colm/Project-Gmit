# Project-Gmit

This repository is a gig guide web based application using the [wamp stack](https://bitnami.com/stack/wamp) for development.

The application has three different types of user that will interact with the system.

1: A Venu owner:
   
      Can create a new event with a date time and price for entry.
      They can add a band to the event by selecting from a list of registered bands if the band has registered to the system.
      If the band has not registered the venu can add some generic information about the band for the event.
   
2: A band:

          Can register to the system with thier name, a band logo and a brief biog.
          This information will be available to the venu for selection if they are playing at an event there.
          
3: A customer:

          Can register with the system and leave a review of the band and or venu.
          They can also leave a rating for the gig.
          
Author's: [Kevin Gleeson](https://github.com/kevgleeson78)
          [Colm Woodlock](https://github.com/cwoodlock)

Third year students at:[GMIT](http://gmit.ie) Galway

## Cloning, compiling and running the application.

1: Download [git](https://git-scm.com/downloads) to your machine if not already installed.

2:Download and install [Wamp](http://www.wampserver.com/) to your machine.
You may need to install additional updates for this to work.

3: Open git bash and cd to the www folder in the wamp64 directory.
Alternatively you can right click on the www folder and select git bash here.
This will open the git command prompt in the folder selected.
 
 4: To clone the repository type the following command in the terminal making sure you are in the folder needed for the repository.
```bash
>git clone https://github.com/Kevin-Colm/Project-Gmit.git
```
5: To run the application first start the wamp server.

6: Load the SQL file holding the datbase found in the exopt foler.
* Open the Command Prompt
* In the Command Prompt type:
```CMD
cd \wamp\bin\mysql\mysql5.6.17\bin
```
*	Then type: 
```CMD
mysql -u root -p < "Full Path\Eport.sql"
```

Then in a browser of your choice enter [http://localhost/Project-Gmit/](http://localhost/Project-Gmit/)
