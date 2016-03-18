<?php
require_once(__DIR__ . '/TA_User.php');


class TA_InlineQuery {
  private $_api; // TelegramApi
  private $id;
  private $from; // TA_User
  private $query;
  private $offset;

  private function TA_InlineQuery($api, $id, $from, $query, $offset) {
    $this->_api = $api;
    $this->id = $id;
    $this->from = $from;
    $this->query = $query;
    $this->offset = $offset;
  }

  public static function createFromJson($api, $json) {
    return TA_InlineQuery::createFromArray($api, json_decode($json));
  }

  public static function createFromArray($api, $arr) {
    return new Self(
          $api,
          $arr['file_id'],
          TA_User::createFromArray($arr['from']),
          $arr['query'],
          $arr['offset']
        );
  }

  public function getId() {
    return $this->id;
  }

  public function getFrom() {
    return $this->from;
  }

  public function getQuery() {
    return $this->query;
  }

  public function getOffset() {
    return $this->offset;
  }
}