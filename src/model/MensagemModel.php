<?php
namespace Source\model;

use PDO;
use PDOException;
use Source\config\DbConfig;

class MensagemModel extends DbConfig {

  private $idMensagem;
  private $idRementente;
  private $idDestinatario;
  private $mensagem;
  private $dataMsg;

  public function __construct($idMensagem=0, $idRementente=0, $idDestinatario=0, $mensagem='', $dataMsg='') {
    $this->idMensagem = $idMensagem;
    $this->idRementente = $idRementente;
    $this->idDestinatario = $idDestinatario;
    $this->mensagem = $mensagem;
    $this->dataMsg = $dataMsg;
    parent::__construct();
  }

  public function print() {
    echo "HELOOO";
  }

  public function save() {
    try {
      $query = $this->db->prepare("INSERT INTO tb_mensagem(id_remetente, id_destinatario, mensagem) VALUES (?, ?, ?)");
      $query->bindValue(1, $this->idRementente);
      $query->bindValue(2, $this->idDestinatario);
      $query->bindValue(3, $this->mensagem);
      $query->execute();
      return true;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  public function listAllMensagens($id, $idDestino) {
    try {
      $query = $this->db->prepare(
        "SELECT id_mensagem, nome_remetente, mensagem FROM (
          SELECT id_mensagem, mensagem, nome as nome_remetente, id_remetente
          from tb_usuario as tb right join (
            SELECT * from tb_mensagem 
            where id_remetente = ? and id_destinatario = ? 
            or id_remetente = ? and id_destinatario = ?
          ) tt on tt.id_remetente = tb.id_user
        ) query_final");
      $query->bindValue(1, $id);
      $query->bindValue(2, $idDestino);
      $query->bindValue(3, $idDestino);
      $query->bindValue(4, $id);
      $query->execute();
      if ($query->rowCount() > 0) {
        $dados = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
      } else {
        return array();
      }
      
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
  
  public function listUser() {
    try {
      $query = $this->db->prepare("SELECT id_user from tb_usuario");
      $query->execute();
      if ($query->rowCount() > 0) {
        $dados = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
      } else {
        return array();
      }
      
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}