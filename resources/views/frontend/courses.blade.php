@extends('index')
@section('content')  

    <!-- start main service form  -->
    <form class="services-container">
            <h2>required info </h2>

            <div class="additional-requirements">
            <label>Country of residence</label><br>
            <select>
            <option>Egypt</option>
            <option>Saudi Arabia</option>
            <option>united arab emirates</option>
            <option>other country</option>
            </select>
            </div>

            <ul class="additional-requirements">
            <label>required course</label><br>
            <li> <input type="text" placeholder=" Add your needed course"></li>
            <!-- <li id="add"onclick="add()"><i class="far fa-plus-square"></i></li> -->
            </ul>

            <ul id="attachments">
            <label>additional attachments</label><br>
            <li> <input type="file"></li>
            <li> <input type="file"></li>
            <li> <input type="file"></li>
            <li> <input type="file"></li>
            <li> <input type="file"></li>
            </ul>


            <ul class="past-link">
            <label>linked files</label>
            <li> <input type="text" placeholder="you can attach your downloadable file links ex : (google drive)"></li>  
            </ul>

            <label>note :</label>
            <p>
            you will get quotation with paypal link for safe payments within next
            48 hours max.<br>
            working days from Saturday to Thursday
            </p>


            <input type="submit" class="submit" value="send">
    </form>
@endsection  






