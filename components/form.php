<img class="background-image" src="https://www.polytech.univ-smb.fr/fileadmin/_processed_/d/b/csm_Polytech_site_Annecy_vu_du_ciel_db27e8c54f.jpg">
<link rel="stylesheet" type="text/css" href="./css/form.css"/>
<script src="./js/form.js"></script>

<div class='form-container'>

<?php
    extract($data);
    print("<h1 id='title' class='text-center'>$title</h1>");
    print("<form action='' method='post' enctype='multipart/form-data'>");
    
    foreach ($content as $key => $value) {

        $key = str_replace(["'"], "" , $key);

        print("<div class='form-group'>");
        switch ($value["type"]) {
            case "text":
                print("<label id='$key' for='$key'>$key</label>");
                print("<input
                    type='text'
                    name='$key'
                    id='$key'
                    class='form-control'");
                if(isset($value['placeholder'])){
                    print("placeholder='" . $value['placeholder'] . "'");
                }else{
                    print("placeholder='Entrer votre $key'");
                }
                if(isset($value['value'])){
                    print("value='" . $value['value'] . "' ");
                }
                if(!isset($value['!required'])){
                    print("required");
                }
                print("/>");
                break;

            case "number":
                print("<label id='$key' for='$key'>$key</label>");
                print("<input
                    type='number'
                    name='$key'
                    id='$key'
                    class='form-control'
                    placeholder='Entrer votre $key'");
                if(isset($value['value'])){
                    print("value='" . $value['value'] . "' ");
                }
                if(!isset($value['!required'])){
                    print("required");
                }
                print("/>");
                break;
    
            case "text-area":
                print("<label id='$key' for='$key'>$key</label>");
                print("<textarea class='form-control' placeholder='Entrer le contenu du message' name='$key' style='resize: none;height: 100px;width: 100%;''></textarea>");
                break;


            case "radio":
                print("<p>$key</p>");
                foreach ($value["options"] as $value => $id) {
                    print("<label>");
                    print("<input name='$key' value='$id' type='radio' class='input-radio' checked=''>$value");
                    print("</label>");
                }
                break;

            case "checkbox":
                print("<p>$key</p>");
                foreach ($value["options"] as $value => $id) {
                    print("<label>");
                    print("<input name='$key.[]' value='$id' type='checkbox' class='input-radio'>$value");
                    print("</label>");
                }
                break;

            case "select":
                print("<p>$key</p>");
                if(isset($value['!required'])){
                    print("<select id='dropdown' name='$key' class='form-control'>");
                }else{
                    print("<select id='dropdown' name='$key' class='form-control' required=''>");
                }
                print("<option disabled selected value>".$value["desc"]."</option>");
                foreach ($value["options"] as $value => $id) {
                    print("<option value='$id'>$value</option>");
                }
                print("</select>");
                break;

            case "file":
                print("<label id='$key' for='$key'>$key</label>");
                print("<input type='file' name='$key' />");
                break;


            case "date":
                print("<p>".$value["title"]."</p>");
                print("<div class='input-date'>");
                print("<input class='box-input' min=' " . date("Y-m-d H:i:s") ."' type='date' name='".$key."_start'>");
                print("<input class='box-input' type='date' name='".$key."_end'>");
                print("</div>");
                break;


        }
        print("</div>");
    }
    ?>
    <div class="form-group">
      <button type="submit" id="submit" class="submit-button">
        Envoyer
      </button>
    </div>

    <?php 
    if (isset($message) && $message !== null) {
        print("<div class='form-group'>");
        print("<p class='message ".$message["type"]."'>".$message["content"]."</p>");
        print("</div>");
    }
    ?>

    </form>
</div>