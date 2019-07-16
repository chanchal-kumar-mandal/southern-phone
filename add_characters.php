<style type="text/css">
  form label {
    display: inline-block;
    width: 140px;
  }

  form div {
    margin-bottom: 10px;
  }

  .error {
    color: red;
    margin-left: 5px;
  }

  label.error {
    display: inline;
  }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<a href="ChanchalMandal.html" title="ChanchalMandal">Home</a>
<a href="import_characters.php" title="Characters" class="btn btn-primary">Characters</a>

<h2>Add Character</h2>
<form id="add_character_form" method="post" action="">
  <div>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required></input>
  </div>
  <div>
    <label for="height">Height:</label>
    <input type="text" id="height" name="height" required></input>
  </div>
  <div>
    <label for="mass">Mass:</label>
    <input type="text" id="mass" name="mass" required></input>
  </div>
  <div>
    <label for="hair_color">Hair Color:</label>
    <input type="hair_color" id="hair_color" name="hair_color" required></input>
  </div>
  <div>
    <label for="skin_color">Skin Color:</label>
    <input type="skin_color" id="skin_color" name="skin_color" required></input>
  </div>
  <div>
    <label for="eye_color">Eye Color:</label>
    <input type="eye_color" id="eye_color" name="eye_color" required></input>
  </div>
  <div>
    <label for="birth_year">Birth Year:</label>
    <input type="birth_year" id="birth_year" name="birth_year" required></input>
  </div>
  <div>
    <label for="gender">Gender:</label>
    <input type="gender" id="gender" name="gender" required></input>
  </div>
  <div>
    <label for="homeworld_name">Homeworld Name:</label>
    <input type="homeworld_name" id="homeworld_name" name="homeworld_name" required></input>
  </div>
  <div>
    <label for="species_name">Species Name:</label>
    <input type="species_name" id="species_name" name="species_name" required></input>
  </div>
  <div>
    <input type="hidden" name="add_character" value="addCharacter">
    <input type="submit" value="Submit" />
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function() {

    $('#add_character_form').submit(function(e) {
      e.preventDefault();
      var name = $('#name').val().trim();
      var height = $('#height').val().trim();
      var mass = $('#mass').val().trim();
      var hair_color = $('#hair_color').val().trim();
      var skin_color = $('#skin_color').val().trim();
      var eye_color = $('#eye_color').val().trim();
      var birth_year = $('#birth_year').val().trim();
      var gender = $('#gender').val().trim();
      var homeworld_name = $('#homeworld_name').val().trim();
      var species_name = $('#species_name').val().trim();
      var isError = 0;

      $(".error").remove();

      if (name.length < 1) {
        isError = 1;
        $('#name').after('<span class="error">This name field is required</span>');
      }
      if (height.length < 1) {
        isError = 1;
        $('#height').after('<span class="error">This height field is required</span>');
      }
      if (mass.length < 1) {
        isError = 1;
        $('#mass').after('<span class="error">This mass field is required</span>');
      }
      if (hair_color.length < 1) {
        isError = 1;
        $('#hair_color').after('<span class="error">This hair color field is required</span>');
      }
      if (skin_color.length < 1) {
        isError = 1;
        $('#skin_color').after('<span class="error">This skin color field is required</span>');
      }
      if (eye_color.length < 1) {
        isError = 1;
        $('#eye_color').after('<span class="error">This eye color field is required</span>');
      }
      if (birth_year.length < 1) {
        isError = 1;
        $('#birth_year').after('<span class="error">This birth year field is required</span>');
      }
      if (gender.length < 1) {
        isError = 1;
        $('#gender').after('<span class="error">This gender field is required</span>');
      }
      if (homeworld_name .length < 1) {
        isError = 1;
        $('#homeworld_name ').after('<span class="error">This homeworld name field is required</span>');
      }
      if (species_name.length < 1) {
        isError = 1;
        $('#species_name').after('<span class="error">This species name field is required</span>');
      }

      if (isError == 0) {
        $.ajax({
              url: 'functions.php',
              type: "POST",
              data: $(this).serialize(),
              success: function(response)
              {
                  var jsonData = JSON.parse(response);
                  if (jsonData.success == "1")
                  {
                    alert('Insertion Successful!');
                    $('#add_character_form')[0].reset();
                  }
                  else
                  {
                    alert('Insertion Error!');
                  }
             }
         });
      }

    });

  });
</script>