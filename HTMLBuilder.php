<?php

class HTMLBuilder{
    /*
     * @var string
     * @access private
     *
     * The purpose of this variable is to allow all of the string variabled to be easily accessed on a class level and to remove the issue of functionally defined variables.
     */
    private $string = null;

    /*
     * @access public
     * @return string for the beginning all all html files
     * @param nill
     *
     * This is the function to generate all of the stupid pre header stuff for html files.
     */
    public function buildDocumentStart(){
        $this->string = "<!DOCTYPE html>\n<html lang=\"en-US\">\n";
    }

    /*
     * @access public
     * @return a closed tag with the exact specifications provided through the args
     * @param $method tag name
     * @param $args all of the items contained within the non self closing tag.
     */
    public function buildClosed($method, $args = null){
        $this->string = "<{$method}>";
        if($args != null) {
            $this->string .= "\n";
            foreach ($args as $args) {
                foreach($args as $value){
                    $this->string .= "\t{$value}\n";
                }
            }
        }
        $this->string .= "</{$method}>";
        return $this->string;
    }

    /*
     * @access public
     * @return a self closed tag with the exact attributes provided through args
     * @param $method tag name
     * @param $args all of the attributes included within the self closing tag.
     */
    public function buildSelfClosed($method, $args = null){
        $this->string = "<{$method} ";
        if($args != null) {
            foreach ($args as $args) {
                foreach ($args as $key => $value) {
                    $this->string .= "$key=\"$value\" ";
                }
            }
        }
        $this->string .= "/>";
        return $this->string;
    }

}
