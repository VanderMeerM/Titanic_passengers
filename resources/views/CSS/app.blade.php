<style>


:root {
    --lightgreen : rgb(174, 216, 149);
    --lightblue: rgb(171, 201, 226);
}

body {
    background-image: url("../titanic-sinking-ship-scene.jpg");
    background-repeat: no-repeat;
   /* background-color: black; */
}

.container {
    display: flex;
}

.container-left {
    flex: 20%;
    max-width: 200px;
    background-color: var(--lightblue);
    padding-left: 10px;       
    height: 1000vh;    
}

#input_name {
    width: 80%;
}

#age_value, 
#age_number {
    background-color: var(--lightblue);
    color: brown;
}


.main-container-right {
     flex: 80%;    
}

.bar-top {
    flex: 100%;
    height: 40px;
   color: yellow;
    padding-left: 1%;
}

.container-right {
    column-count: 5;
    min-height: 800px;
      
}

.formname {
    position: fixed;
    top: 20px;
    background-color: var(--lightblue);
    width: 184px;
}

.formchecks {
    position: fixed;
    top: 150px;
    background-color:  var(--lightblue);
  
}

hr {
    margin: 0px;
}

.inline {
    display: inline-block;
}


#name-person,
#name-person a:link
 {
    padding: 5px;
    color: var(--lightgreen);
    font-weight: bolder;
    text-decoration: none;
}

#name-person a:link {
    padding: 10px;
}


#name-person a:visited {
    color: lightgray;
}

.container_detail {
    text-align: center;
}

#name_detail {
    color: var(--lightgreen);
    font-weight: bolder;
    font-size: 20px;
    margin-top: 10%;
}


#btn-filter, 
#btn-filter_red {
    background-color: darkblue;
    padding: 10px;
    border-radius: 25px;
    color: white;

}

.margin_left {
    margin-left: 25%;

}

#btn-filter_red {
    background-color: red;
}


@media (max-width: 1045px) {
    .container-right {
        column-count: 4;
}
.formname, 
.formchecks {
    width: 100px;
}
}

@media (max-width: 900px) {
.formchecks {
    width: 150px;
}
}

@media (max-width: 800px) {
    .container-right {
        column-count: 3;
}
}

@media (max-width: 650px) {
    .formchecks, .formname {
        width: 100px;
    }
}

@media (max-width: 550px) {
    .formchecks, .formname,
    #age_value, #age_number {
        width: 80px;
    }

 }

@media (max-width: 500px) {
    .container-right {
        column-count: 2;
}
    #input_name {
        width: 80px;
    }
}



</style>