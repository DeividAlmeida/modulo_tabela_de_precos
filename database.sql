SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `atendimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_central` int(25) NOT NULL,
  `face` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `whats` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `line` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `telegram` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vkontakte` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sms` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `p_call` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `g_f` int(25) DEFAULT NULL,
  `g_w` int(25) DEFAULT NULL,
  `g_l` int(25) DEFAULT NULL,
  `g_t` int(25) DEFAULT NULL,
  `g_v` int(25) DEFAULT NULL,
  `g_s` int(25) DEFAULT NULL,
  `g_c` int(25) DEFAULT NULL,
  `g_e` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS `c_atendimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `saudação` text CHARACTER SET utf8 DEFAULT NULL,
  `cor` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `posição` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `gatilho` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `modulos` (`nome`, `url`, `icone`, `status`, `ordem`, `tabela`, `cod_head`, `data_atualizacao`, `chave`)
SELECT 'Atendimento', 'atendimento.php', 'icon-comment', 1, 0, 'atendimento', 'atendimento/atendimento.js', '2020-05-08', 'c8eed2de81022765dc7d4dfcf4d7c864';


UPDATE `modulos` SET `acao` = '{\r\n \"atendimento\":[\"adicionar\",\"editar\",\"deletar\"],\r\n \"central\":[\"adicionar\",\"editar\",\"deletar\"],\r\n \"codigo\":[\"acessar\"],\r\n \"relatorio\":[\"acessar\"]\r\n}' WHERE `modulos`.`url` = 'atendimento.php';