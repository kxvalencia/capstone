<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Appointments.css">
</head>

<body>
    <!-- Header pane -->
    <div class="header">
        <h1>Appointments</h1>
        <div class="nav">
            <a href="patient.php">Patients</a>
            <a href="prescriptions.php">Prescriptions</a>
            <a href="patient_profile.php">Patient Management System</a>
            <a href="reports.php">Reports & Analytics</a>
        </div>
    </div>


    <!-- Patient Info section -->
    <div class="profile-box">
        <div class="profile-section">
            <h2>Patient Details</h2>
            <p><strong>Name:</strong></p>
            <p><strong>Appointment Date:</strong></p>
            <p><strong>Time:</strong></p>
            <p><strong>Physician:</strong></p>
            <p><strong>Reason for visit:</strong></p>
            <select name="Reason">
                <option value="Select">(Select Reason)</option>
                <option value="First Visit">First Visit</option>
                <option value="Follow-up Visit">Follow-up Visit</option>
                <option value="Wellness Check">Wellness Check</option>
                <option value="Pre-Op Consultation">Pre-Op Consultation</option>
                <option value="Surgery">Surgery</option>
                <option value="Post-op Consultation">Post-op Consulation</option>
            </select>
        </div>

        <!-- Button selection area -->
        <h3>Appointment Options</h3>
        <div class="tabs">
            <a class="tab-link active" id="popup-link" onclick="openFormCreate(); showTab()">Create Appointment</a>
            <a class="tab-link" id="popup-link" onclick="openFormModify(); showTab()">Modify Appointment</a>
            <a class="tab-link" id="popup-link" onclick="openFormPrevious(); showTab()">Previous Appointments</a>
            <a class="tab-link" id="popup-link" onclick="openFormCalender(); showTab()">Calender</a>
        </div>


        <!-- Create Appointment -->
        <div id="popup-window" class="popupWindow">
            <h3 class="title">New Appointment</h3>
            <form class="form-popup">
                <input type="text" placeholder="First Name" class="inputField">
                <input type="text" placeholder="Last Name" class="inputField">
                <input type="datetime" placeholder="Appointment Date" class="inputField">
                <input type="datetime" placeholder="Appointment Time" class="inputField">
              
                <button class="submit" type="submit">Submit</button>
                
            </form>
            <button class="closeButton" ="close-button" onclick="closeFormCreate()">Close</button>

        </div>

        <!-- Modify Appointment -->
        <div id="modify-window" class="popupWindow">
            
            <div class="formBox">
                <h3 class="title">Existing Appointment</h3>
                <div class="tabs">
                    <button class="tabButton active" onclick="ShowTab('reschedAppointment')">Reschedule Appointment</button>
                    <button class="tabButton" onclick="ShowTab('cancelAppointment')">Cancel Appointment</button>
                </div>

                <!-- Reschedule Appointment -->
                <form id="reschedAppointment" class="inputGroup">
                    <input type="text" placeholder="First Name" class="inputField">
                    <input type="text" placeholder="Last Name" class="inputField">
                    <input type="datetime" placeholder="Original Appointment Date" class="inputField">
                    <input type="datetime" placeholder="Original Appointment Time" class="inputField">
                    <input type="datetime" placeholder="New Appointment Date" class="inputField">
                    <input type="datetime" placeholder="New Appointment Time" class="inputField">
                    <button class="submit" type="submit" class="submitButton">Reschedule</button>
                </form>
    
                <!-- Cancel Appointment -->
                <form id="cancelAppointment" class="inputGroup hidden">
                    <input type="text" placeholder="First Name" class="inputField">
                    <input type="text" placeholder="Last Name" class="inputField">
                    <input type="datetime" placeholder="Appointment Date" class="inputField">
                    <input type="datetime" placeholder="Appointment Time" class="inputField">
                    <button class="submit" type="submit" class="submitButton">Cancel</button>
                </form>
            </div>
            <button class="closeButton" id="close-button" onclick="closeFormModify()">Close</button>

        </div>

        <!-- Previous Appointments -->
        <div id="previous-window" class="popupWindow">
            <h3 class="title">Appointment History</h3>
            <form class="form-popup">
                <p><strong>Name:</strong></p>
                <p><strong>Appointment Date:</strong></p>
                <p><strong>Time:</strong></p>
                <p><strong>Physician:</strong></p>
                <p><strong>Reason for visit:</strong></p>
              
                <button type="submit">Back</button>
                <button type="submit">Next</button>
                
            </form>
            <button class="closeButton" onclick="closeFormPrevious()">Close</button>

        </div>

    

        <script>
            // Functions to open and close 'Create Appointment' button
            function openFormCreate() {
             document.getElementById("popup-window").style.display = "block";
            }
 
            function closeFormCreate() {
             document.getElementById("popup-window").style.display = "none";
            }
            
            // Functions to open and close 'Modify Appointment' button
            function openFormModify() {
             document.getElementById("modify-window").style.display = "block";
            }
 
            function closeFormModify() {
             document.getElementById("modify-window").style.display = "none";
            }

            // Functions to open and close 'Past Appointments' button
            function openFormPrevious() {
                document.getElementById("previous-window").style.display = "block";
            }

            function closeFormPrevious() {
                document.getElementById("previous-window").style.display = "none";
            }

            // Functions to open and close 'Calender' button
            function openFormCalender() {
             document.getElementById("calender").style.display = "block";
            }
 
            function closeFormCalender() {
             document.getElementById("calender").style.display = "none";
            }

            // Functions to oscillate between 'Reschedule' & 'Cancel' buttons
            function ShowTab(id) {
            var forms = document.getElementsByClassName('inputGroup');
            for(var i = 0; i < forms.length; i++) {
                forms[i].classList.add('hidden');
            }
            document.getElementById(id).classList.remove('hidden');

            var buttons = document.getElementsByClassName('tabButton');
            for(var i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove('active');
            }
            event.currentTarget.classList.add('active');
        }

        function showTab(tabId) {
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => {
                tab.classList.remove('active');
            });

            const tabLinks = document.querySelectorAll('.tab-link');
            tabLinks.forEach(link => {
                link.classList.remove('active');
            });

            document.getElementById(tabId).classList.add('active');
            [...tabLinks].find(link => link.getAttribute('onclick') === `showTab('${tabId}')`).classList.add('active');
        }
 
 
         </script>

         <!-- Calender -->
        <div id="calender" class="calenderWindow">
            <button class="closeButton" id="close-button" onclick="closeFormCalender()">close</button>
            <!-- Here we are using attributes like 
        cellspacing and cellpadding -->
  
    <!-- The purpose of the cellpadding is  
        the space that a user want between 
        the border of cell and its contents-->
  
    <!-- cellspacing is used to specify the  
        space between the cell and its contents -->
    <h2 align="center" style="color: blue;"> 
        October 2023 
    </h2> 
    <br /> 
      
    <table bgcolor="lightgrey" align="center" 
        cellspacing="21" cellpadding="21"> 
          
        <!-- The tr tag is used to enter  
            rows in the table -->
  
        <!-- It is used to give the heading to the 
            table. We can give the heading to the  
            top and bottom of the table -->
  
        <caption align="top"> 
            <!-- Here we have used the attribute  
                that is style and we have colored  
                the sentence to make it better  
                depending on the web page-->
        </caption> 
  
        <!-- Here th stands for the heading of the 
            table that comes in the first row-->
  
        <!-- The text in this table header tag will  
            appear as bold and is center aligned-->
  
        <thead> 
            <tr> 
                <!-- Here we have applied inline style  
                     to make it more attractive-->
                <th>Sun</th> 
                <th>Mon</th> 
                <th>Tue</th> 
                <th>Wed</th> 
                <th>Thu</th> 
                <th>Fri</th> 
                <th>sat</th> 
            </tr> 
        </thead> 
          
        <tbody> 
            <tr> 
                <td>1</td> 
                <td>2</td> 
                <td>3</td> 
                <td>4</td> 
                <td>5</td> 
                <td>6</td> 
                <td>7</td> 
            </tr> 
            <tr></tr> 
            <tr> 
                <td>8</td> 
                <td>9</td> 
                <td>10</td> 
                <td>11</td> 
                <td>12</td> 
                <td>13</td> 
                <td>14</td> 
            </tr> 
            <tr> 
                <td>15</td> 
                <td>16</td> 
                <td>17</td> 
                <td>18</td> 
                <td>19</td> 
                <td>20</td> 
                <td>21</td> 
            </tr> 
            <tr> 
                <td>22</td> 
                <td>23</td> 
                <td>24</td> 
                <td>25</td> 
                <td>26</td> 
                <td>27</td> 
                <td>28</td> 
            </tr> 
            <tr> 
                <td>29</td> 
                <td>30</td> 
                <td>31</td> 
                <td>1</td> 
                <td>2</td> 
                <td>3</td> 
                <td>4</td> 
            </tr> 
            <tr> 
                <td>5</td> 
                <td>6</td> 
                <td>7</td> 
                <td>8</td> 
                <td>9</td> 
                <td>10</td> 
                <td>11</td> 
            </tr> 
        </tbody> 
    </table> 
        </div>