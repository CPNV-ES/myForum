<?php
class ViewHelpers {
    public static function pushFlashMessage($flashmessage) {
        if(!isset($_SESSION["flash_messages"])) {
            $_SESSION["flash_messages"] = [];
        }

        array_push($_SESSION["flash_messages"], $flashmessage);
    }

    public static function popFlashMessage() {
        if(!isset($_SESSION["flash_messages"])) {
            return null;
        }

        return array_pop($_SESSION["flash_messages"]);
    }

    public static function shiftFlashMessage() {
        if(!isset($_SESSION["flash_messages"])) {
            return null;
        }

        return array_shift($_SESSION["flash_messages"]);
    }
}