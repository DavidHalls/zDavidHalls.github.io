<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Who Am I?</title>
        
        <style>
            body{
                background-color: blue;
                margin-left: auto;
                margin-right: auto;
                background-image: url("group_cool.jpg");

            }   
            #rcorners2 {
                border-radius: 25px;
                border: 12px solid black;
                padding: 20px; 
                width: 500px;
                height: auto;
                margin-left: auto;
                margin-right: auto;
                color: red;
                font-size: 24px;
                opacity: .8;
                background-color: white;    
            }
            select.element{
                margin-left: auto;
                margin-right: auto;
                width: 305px;
                display: inline-block;

            }
            input.element{
                margin-left: auto;
                margin-right: auto;
                width: 300px;
                display: inline-block;
            }

        </style>
    </head>
    <body>
        <div id="rcorners2">

            <div id="form_container">
                <form method="post" action="WhoYouAre.php">
                    <legend class="form_description"><h2>Your Information</h2></legend>
                    <ul type="none">
                        <li>
                            <div>                             
                                <label class="description">Name</label><br>
                                <input type='text' name='Name' id='Name' placeholder="First Last" class="element text medium required">                                
                            </div>
                        </li>
                        <li>
                            <div>
                                <label class="description">Age</label><br>
                                <input type="text" name="Age"  id="Age" placeholder="Enter your age" class="element text medium required" />
                            </div>
                        </li>
                        <li>
                            <label class="description">Have you had your birthday this year?</label><br>
                                <select name="Bday" id="Bday" class="element select medium required" >
                                    <option value='Bday' selected='true' disabled >Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>                                    
                                </select>
                        </li>
                          
                        <li>
                            <div>
                                <label class="description">Address</label><br>
                                <input type="text" name="Address" id="Address" placeholder="Enter your Address" class="element text medium required" />
                            </div>
                        </li>
                        <li>
                        <li>
                            <div>
                                <label class="description">City</label><br>
                                <input type="text" name="City" id="City" placeholder="Enter your City" class="element text medium required" />
                            </div>
                        </li>
                        <li>
                            <div>
                                <label class="description">State</label><br>
                                <select name="State" id="State" placeholder="Select your State" class="element select medium required" >
                                    <option value="Select" selected='true' disabled>Select your State</option>
                                    <option value="AK">AK</option>
                                    <option value="AL">AL</option>
                                    <option value="AR">AR</option>
                                    <option value="AZ">AZ</option>
                                    <option value="CA">CA</option>
                                    <option value="CO">CO</option>
                                    <option value="CT">CT</option>
                                    <option value="DC">DC</option>
                                    <option value="DE">DE</option>
                                    <option value="FL">FL</option>
                                    <option value="GA">GA</option>
                                    <option value="HI">HI</option>
                                    <option value="IA">IA</option>
                                    <option value="ID">ID</option>
                                    <option value="IL">IL</option>
                                    <option value="IN">IN</option>
                                    <option value="KS">KS</option>
                                    <option value="KY">KY</option>
                                    <option value="LA">LA</option>
                                    <option value="MA">MA</option>
                                    <option value="MD">MD</option>
                                    <option value="ME">ME</option>
                                    <option value="MI">MI</option>
                                    <option value="MN">MN</option>
                                    <option value="MO">MO</option>
                                    <option value="MS">MS</option>
                                    <option value="MT">MT</option>
                                    <option value="NC">NC</option>
                                    <option value="ND">ND</option>
                                    <option value="NE">NE</option>
                                    <option value="NH">NH</option>
                                    <option value="NJ">NJ</option>
                                    <option value="NM">NM</option>
                                    <option value="NV">NV</option>
                                    <option value="NY">NY</option>
                                    <option value="OH">OH</option>
                                    <option value="OK">OK</option>
                                    <option value="OR">OR</option>
                                    <option value="PA">PA</option>
                                    <option value="RI">RI</option>
                                    <option value="SC">SC</option>
                                    <option value="SD">SD</option>
                                    <option value="TN">TN</option>
                                    <option value="TX">TX</option>
                                    <option value="UT">UT</option>
                                    <option value="VA">VA</option>
                                    <option value="VT">VT</option>
                                    <option value="WA">WA</option>
                                    <option value="WI">WI</option>
                                    <option value="WV">WV</option>
                                    <option value="WY">WY</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div>
                                <label class="description">Gender</label><br>
                                <select name="Gender" id="Gender" class="element select medium required" >
                                    <option value='gender' selected='true' disabled >Select your Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>                                    
                                </select>
                            </div><br>
                        </li>

                        <div>
                            <input type="submit" name="Send"><br>
                        </div>
                </form>
            </div></div>
        <br>

