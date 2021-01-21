@extends('index')
@section('content')  
<!-- start career  -->

    <form class="career">
        <h2> join our team </h2>
        
        <div>
        <label>type</label><br>
          <input type="radio" name="freelance" value="freelance"><span>freelance</span><br>
          <input type="radio" name="part time" value="part time"><span>part time</span><br>
          <input type="radio" name="full time" value="full time"><span>full time</span><br>
        </div>

        <div>
            <label>country of residence</label><br>
            <input type="text" class="typer">

        </div>
        
        <div>
            <label>nationality</label><br>
            <input type="text" class="typer">

        </div>

        <div>
            <label>rate range</label>
            <table>
                <tr>
                    <td>monthly</td>
                    <td><input type="number" placeholder=" from"></td>
                    <td><input type="number" placeholder=" to"></td>
                    <td> <i class="fas fa-dollar-sign"></i></td>
                </tr>
                <tr>
                    <td>hourly </td>
                    <td><input type="number" placeholder=" from"></td>
                    <td><input type="number" placeholder=" to"></td>
                    <td> <i class="fas fa-dollar-sign"></i></td>
                </tr>


            </table>
        </div>

        <div>
            <label> select your preferred career pass</label>
            <select>
                <option>engineering</option>
                <option> accounting</option>
                <option>finance</option>
                <option>It</option>
                <option>draftsman </option>
                <option>management </option>
                <option id="more-vac">other ..</option>
            </select>

        </div>


        <div>
            <label>upload your CV</label>
            <input type="file" class="dash">

        </div>
        <input type="submit" class="submit" value="send">
        <input type="reset" class="submit" value="reset">
    </form>

<!-- end career  -->
@endsection