SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

INSERT INTO `modulos` (`nome`, `url`, `icone`, `status`, `ordem`, `tabela`, `cod_head`, `data_atualizacao`, `chave`)
SELECT 'Tabela de Precos', 'tabela_de_precos.php', 'icon-usd', 1, 0, 'tabela_de_precos', 'tabela_de_precos/tabela_de_precos.js', '2019-10-24', '72b4b1d7ce2b514a981a49b1db5790a7';

CREATE TABLE IF NOT EXISTS `tabela_de_precos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `social` text NOT NULL,
  `imagem_arquivo` varchar(255) NOT NULL,
  `txt_bt` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `auxiliar` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `bt_link` text CHARACTER SET utf8 DEFAULT NULL,
  `guia` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `featured` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cor_txt_ft` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cor_bg_ft` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cor_tg_ft` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cor_txt_tg_ft` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tg_txt` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
ALTER TABLE `tabela_de_precos` ADD PRIMARY KEY (`id`);
ALTER TABLE `tabela_de_precos` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE IF NOT EXISTS `c_tabela_de_precos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `colunas` int(2) DEFAULT NULL,
  `estilo` int(2) NOT NULL,
  `cor_titulo` varchar(50) DEFAULT NULL,
  `cor_subtitulo` varchar(50) DEFAULT NULL,
  `cor_borda` varchar(50) DEFAULT NULL,
  `efeito` varchar(100) DEFAULT NULL,
  `ordenar_por` varchar(255) NOT NULL,
  `asc_desc` enum('ASC','DESC') NOT NULL DEFAULT 'ASC',
  `limite` int(3) DEFAULT NULL,
  `ativa_paginacao` enum('S','N') DEFAULT 'N',
  `cor_bg` varchar(50) NOT NULL,
  `cor_bg_titulo` varchar(50) NOT NULL,
  `cor_bg_botao` varchar(50) NOT NULL,
  `cor_botao` varchar(50) NOT NULL,
  `cor_hover_botao` varchar(50) NOT NULL,
  `cor_icone` varchar(50) NOT NULL,
  `cor_hover_icone` varchar(50) NOT NULL,
  `cor_hover_txt` varchar(50) NOT NULL,
  `efeito_hover` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
ALTER TABLE `c_tabela_de_precos` ADD PRIMARY KEY (`id`);
ALTER TABLE `c_tabela_de_precos` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

UPDATE `modulos` SET `acao` = "{\"item\":[\"adicionar\",\"editar\",\"deletar\"],\"categoria\":[\"adicionar\",\"editar\",\"deletar\"],\"codigo\":[\"acessar\"]}" WHERE `modulos`.`url` = 'tabela_de_precos.php';