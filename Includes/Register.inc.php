<form method="post" action="Php/Register.php">
    <div class="account">

        <h3>Register</h3>

        <div class="Input_Box_Register">
            <input type="email" name="Email" placeholder="Email" required>
            <input type="Text" name="Password" placeholder="Password" required>
            <input type="text" name="Name" placeholder="Name" required>
            <input type="text" name="Middel Name" placeholder="Middel Name" >
            <input type="text" name="Surname" placeholder="Surname" required>
            <input type="date" name="Birthday" placeholder="Birthday" required>
            <input type="text" name="Street" placeholder="Street" required>
            <input type="text" name="Residence" placeholder="Residence" required>
            <input type="text" name="Postal Code" placeholder="Postal Code" required>
            <select hidden="hidden" name="Roleid">
                <option hidden="hidden" value="1">Customer</option>
            </select>
        </div>
        <button type="submit" class="Btn_Register">Account maken</button>
    </div>
</form>

