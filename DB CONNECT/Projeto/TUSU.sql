CREATE TABLE IF NOT EXISTS `TUSU` (
  `ID_TUSU` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `MATRICULA` int(10) NOT NULL DEFAULT '0',
  `SENHA` varchar(32) NOT NULL DEFAULT '',
  `NIVEL` char(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID_TUSU_023`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
