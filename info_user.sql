-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 27, 2023 lúc 09:09 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `info_user`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `tenmathang` varchar(40) NOT NULL,
  `gia` int(10) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `tenmathang`, `gia`, `image_path`) VALUES
(1, 'but', 3000, './img/but.png'),
(2, 'sach', 5000, './img/book.jpeg'),
(3, 'sach truyen', 1000, './img/sach.jpg'),
(4, 'Iphone', 30000000, './img/iphone15.png'),
(5, 'áo', 10000, '/kichban3/img/ao.jpg'),
(7, 'sach truyen', -10000, '/kichban3/img/sach.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `hoten` varchar(40) NOT NULL,
  `sdt` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `sotien` int(255) NOT NULL DEFAULT 1000000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `hoten`, `sdt`, `email`, `role`, `sotien`) VALUES
(1, 'admin', '123456789', 'admin', '0246824333', 'admin2002@gmail.com', 1, 997000),
(2, 'userviet123', 'viet12345', 'tran quoc viet', '02468244444', 'tranquocviethehe@gmail.com', 0, 1014003),
(3, 'user111', 'user111@111', 'user1', '0246825252', 'user111@gmail.com', 0, 979000),
(4, 'user222', 'user222@222', 'user2', '024682434334', 'user222@gmail.com', 0, 18);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- cấp quyền
GRANT FILE ON *.* TO 'viet'@'%';
GRANT SELECT ON info_user.* TO 'viet'@'%';
flush privileges;
