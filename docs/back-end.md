# Giới thiệu Dự án Backend PHP

![PHP Sticker](https://img.shields.io/badge/PHP-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![Composer Sticker](https://img.shields.io/badge/Composer-885630.svg?style=for-the-badge&logo=composer&logoColor=white)

## Mô Tả Dự Án
Dự án này là một ứng dụng backend được phát triển bằng PHP, sử dụng Composer để quản lý các thư viện và phụ thuộc. Dự án được thiết kế để chạy trên môi trường Windows Subsystem for Linux (WSL), mang lại sự linh hoạt và hiệu suất cao cho các phát triển backend.

## Mục Lục
- [Yêu cầu hệ thống](#yêu-cầu-hệ-thống)
- [Cài đặt Môi Trường](#cài-đặt-môi-trường)
    - [Cài đặt PHP](#cài-đặt-php)
    - [Cài đặt Composer](#cài-đặt-composer)
    - [Cài đặt Dự án](#cài-đặt-dự-án)
- [Chạy Dự án](#chạy-dự-án)
- [Kết Luận](#kết-luận)

## Yêu Cầu Hệ Thống
- Hệ điều hành: Windows 10 hoặc 11 với Windows Subsystem for Ubuntu/Linux (WSL) hệ điều hành nhân Linux.
- WSL đã được cài đặt và cấu hình trên máy tính (nếu dùng window).

## Cài Đặt Môi Trường

### 1. Cài đặt PHP và Composer
Để cài đặt PHP và Composer có thể sử dụng lệnh sau:

```bash
apt install php
apt install composer
```

#### 2 Cài đặt Git
```bash
apt install git
```

#### 3 Cài Đặt DỰ ÁN
Clone project backend về:
```bash
git clone -b back-end git@github.com:wwenrr/btl-lap-trinh-web.git
```
Cài đặt thư viện trong composer.json
```bash
compose install
```

## Chạy dự án
```bash
composer start
```


