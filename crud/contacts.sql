-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Out-2023 às 19:12
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `contatos`
--
--Deve-se criar o banco de dados com o nome `contacts`.
-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--
--Deve-se criar uma tabela chamada de `contatos`.

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT primary key,
  `fullName` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estrutura da tabela `user`
--
--Deve-se criar uma tabela com o nome de `user`, para o login.
  CREATE TABLE `user` (
    `id` int(11) NOT NULL AUTO_INCREMENT primary key,
    `email` varchar(100) DEFAULT NULL,
    `password` varchar(255) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

-- INSERT INTO `user` (`id`, `email`, `password`) VALUES
-- (1, 'joyce@hotmail.com', '$argon2i$v=19$m=65536,t=4,p=1$eEl5cXM5cUZobk5RdTRuSw$E1gmlPsElmLRQCMf5kE1WBgzSDXYPbm0LrayPeaeEkA'),
-- (2, 'joyce@hotmail.com', '$argon2i$v=19$m=65536,t=4,p=1$ZmtVcHJhc1NkcE1IYUVmSw$hbeHIV5Kspukmh8c+G4lS7a8XJYAIHYyBV3Ns6Emye0'),
-- (3, 'joyce@hotmail.com', '$argon2i$v=19$m=65536,t=4,p=1$WkdlRHVFSWRmSEtuOGpDRA$W3AeY+PKfn6Vzjog3tsVkvi4CD9DQ4EnmNX62BqEne0'),
-- (4, 'joyce@hotmail.com', '$argon2i$v=19$m=65536,t=4,p=1$b3RDdmZZNldkOXBYZC85Yg$juh+Utw/Q1o/NVqOuvkH5aole7kI6L+0y8hDjdj9xec'),
-- (5, 'joyce@hotmail.com', '$argon2i$v=19$m=65536,t=4,p=1$LmI2Z3RpanRGZG5pc1ltWg$Qf1Vby2pvXsmcRh3BTEEZZ9dKbDaSGneIG5O9BWcEbs'),
-- (6, 'joyce@hotmail.com', '$argon2i$v=19$m=65536,t=4,p=1$M1p2ZFN1Q1BCQ08yL0M4Qg$NUs91ejJeXHDrFNMmM4PLcTIkkuOWFSuEvqVqu+T/3g'),
-- (7, 'email@email.com', '$argon2i$v=19$m=65536,t=4,p=1$OEtIYU04NXR1MVpZUFpSUQ$uW3oiiTh6f7a/YITQ7jMSeMbfZ74Y5XCQNwEWW8ZvrA'),
-- (8, 'teste@teste.com', '$argon2i$v=19$m=65536,t=4,p=1$V291NGs2NjlLSlpveGY2Zg$AOyN1gxZ92QoCgt4ftHETMmI05l715jkR28iMxdljpU'),
-- (9, 'test@test.com', '$argon2i$v=19$m=65536,t=4,p=1$Sndkc2NVbi5KdktPVlp6Zw$yf2gSVRFLrc72bVfsqtQ3khHHxMQCPE2gWp+xn37WTI'),
-- (10, 'test@test.com', '$argon2i$v=19$m=65536,t=4,p=1$MlFXN2hqR09FSU1jYng1Rg$N3WEbIySZ+BZ94k0dGJr0pJyTpdSINE7eC0I3Lxo+Q8');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tarefas`
--
-- ALTER TABLE `tarefas`
--   ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
-- ALTER TABLE `user`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tarefas`
--
-- ALTER TABLE `tarefas`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `user`
--
-- ALTER TABLE `user`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
