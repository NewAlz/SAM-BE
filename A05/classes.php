<?php
class Islands
{
    public $id;
    public $name;
    public $imageSrc;


    public function __construct($id, $name, $imageSrc)
    {
        $this->id = $id;
        $this->name = $name;
        $this->imageSrc = $imageSrc;
    }

    public function generateCard()
    {
        return "
            <div class='w3-col m3'>
                <form method='POST' action='Island.php' style='display:inline;'>
                    <input type='hidden' name='islandID' value='{$this->id}'>
                    <input type='hidden' name='islandName' value='{$this->name}'>
                    <input type='hidden' name='islandImage' value='{$this->imageSrc}'>
                            <button type='submit' style='border: none; background: none; padding: 0;'>
                                <img src='images/{$this->imageSrc}.png' style='width:100%' class='w3-hover-opacity' alt='{$this->name}'>
                            </button>
                </form>
            </div>";
    }   
}

class Contents {

    public $contentImage;
    public $contents;

    public function __construct($contentImage, $contents)
    {
        $this->contentImage = $contentImage;
        $this->contents = $contents;
    }

    public function generateSecondCard()
    {
        return "
            <div class'content-container'>
                <img src='images/{$this->contentImage}.png' alt='{$this->contents}' style='width: 100%;'>
            </div>
            ";
    }
}
?>