<style>


:root {
    --lightgreen : rgb(174, 216, 149);
    /*--lightblue: rgb(171, 201, 226);*/
    --tit_red: #9c200a;
}


body {
    background-image: url("../titanic-sinking-ship-scene.jpg");
    
}

.bar-top {
    flex: 100%;
    height: 40px;
    padding-left: 1%;
}

.buttonbar {
    align-items: baseline;
    width: 80%;
    top: 10px;
    background-color: whitesmoke;
    position: fixed;
    font-family: Arial, Helvetica, sans-serif;
}

.buttonbar a {
color: #9c200a;
text-decoration: none;
}

.container {
    display: flex;
}

.container-left {
    flex: 20%;
    max-width: 230px;
    background-color: whitesmoke;
    padding-left: 10px;       
   /* height: 1000vh; */
}

#input_name {
    width: 80%;
}

#age_value, 
#age_number {
    color: brown;
    border: 1px solid brown;
    margin: 0 4px;
    max-width: 95px;
}

#show_hide_nat {
display: none;
}

.main-container-right {
     flex: 80%;    
     margin: 5% 1% 0 3%;
}


.container-right {
    column-count: 5;
    min-height: 800px;
      
}

.formname, .formchecks {
    position: fixed;
    top: 0px;
    background-color: whitesmoke;
    color: var(--tit_red);
    width: 200px;
}

.formchecks {
   top: 150px;
  
}

.scroll-box {
  max-width:220px;
  height:  calc(100vh - 200px);
  overflow: auto;
  scrollbar-width: thin;
    background-color: whitesmoke;

}

hr {
    margin: 0px;
}

.inline {
    display: inline-block;
}

.select {
    display: flex;
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
    margin-top: 3%;
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


.loginout {
    position:absolute;
    right: 0;
    margin-right: 2%; 
    width: 30px;
    cursor: pointer;
    height: auto;
}


.img_pass {
    max-width: 250px;
    height: auto;
}


@media (max-width: 1280px) {
.main-container-right {
    margin-left: 30%;
}

.buttonbar {
    width: 70%;
}
}

@media (max-width: 1045px) {
    .container-right {
        column-count: 4;
}

.main-container-right {
    margin-top: 10%;
}

.formname, 
.formchecks {
    width: 20%;
}
.select {
    display: block;
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