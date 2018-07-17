# Recrutment Test - Quick Bet Online

This task was made for knowledge demonstration purpose !

## The Graphical User Interface - GUI 
**consists of three buttons that trigger**
- **MODAL** *button* that is used for data conversion from database where the user have to choose the correct input field
   		and a table that shows the data from the database
   		
- **MODAL** *button* that is used for data conversion from database where the user is presented with one smart input field that gets data accordingly
   		and a table that shows the data from the database
   		
- **BUTTON** that shows / hides the legacy table from the document

## Required Features Accomplished
- inputs that allow user to convert betting odds
- data loaded from database
- user input being logged
- properly format code
- security ( done in the back-end mostly )   *SQL Injection, XSS*

## Bonus Features
- ENABLED OFFLINE MODE via ServiceWorkers
- Mintainable Application
- Interactivity and UI
- Animations
- Error Handeling
- Mobile Friendly
- Low Bandwith ( done by ServiceWorkers )
- Showcase pictures


### Prerequisites

What things you need to install the software and how to install them
```
WAMP or XAMPP or MAMP or LAMP with php 7+
```

## Built With

* HTML5
* CSS3
* JavaScript
* Bootstrap
* jQuery
* PHP
* mySQL


## Files structure

------------
```
files
├── api                         // api files
├── css                         // css files
├── images                      // image files
├── javascript                  // javascript files (custom and mandatory)
├── sys                         // core aplication folder
│    ├── components             // components fort the website
│    ├── includes               // header and footer for the website
│    ├── models                 // model files for the API
│    ├── config.json            // database configuration file
│    └── database.php           // core database class
│
├── index.php                   // application homepage
└── serviceWorker.js            // Service Worker for offline and caching
```

## SQL Database 

**has two tables - The Database creation file is bets_converter.sql**

- **conversion_chart** *the table where the conversion data comes from* 
    * id
    * fractional_odds
    * decimal_odds
    * moneyline_odds
- **input log**			*the table where the user input is being logged*
    * id
    * field_value
    * field_id
    * data_created

## Authors

* **Neven Gjoreski** - *Initial work* - [nevengjoreski](https://github.com/nevengjoreski)


## Offline Tip
 
**After the first initial load , you can test it offline in Chrome**

![Screenshot](showcase/offline_tip.PNG?raw=true "Offline Tip")


## Showcase images

![Screenshot](showcase/Error_Handeling.PNG?raw=true "Error_Handeling")

### Error Handeling

![Screenshot](showcase/Error_Handeling.PNG?raw=true "Error_Handeling")

### HomeScreen

![Screenshot](showcase/HomeScreen.PNG?raw=true "HomeScreen")

### Improved loading time

![Screenshot](showcase/Improved_loading_time_SERVICE_WORKER.PNG?raw=true "Improved_loading_time_SERVICE_WORKER")

### Offline Detection

![Screenshot](showcase/Offline_Detection.PNG?raw=true "Offline_Detection")

### Smart Conversion Chart

![Screenshot](showcase/Smart_Conversion_Chart.PNG?raw=true "Smart_Conversion_Chart")

### Standard Conversion Chart

![Screenshot](showcase/Standard_Conversion_Chart.PNG?raw=true "Standard_Conversion_Chart")
