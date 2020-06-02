<p align="center">
Project by Subject "Introduction Software Technology"
</p>

## About QuanLyPhongKham

Quản lý phòng khám (phòng mạch tư) là đồ án môn "Nhập môn công nghệ phần mềm" của nhóm CNPM (Lớp SE104.K22 - ĐH Công Nghệ Thông Tin (UIT)). Quản lý phòng khám là phần mềm dùng cho các phòng mạch tư để dể dàng quản lý bệnh nhân và các đơn thuốc hằng ngày,.... Đồ án quản lý phòng mạch bao gồm các chức năng như sau:

- Quản lý bệnh nhân (DS các bệnh nhân, thêm, xóa, sửa bệnh nhân).
- Quản lý phiếu khám bệnh (DS các phiếu khám bệnh, thêm xóa, sửa phiếu khám bệnh).
- Kê đơn thuốc và xuất đơn thuốc + hóa đơn cho bệnh nhân.
- Tự động lập danh sách bệnh nhân khám theo từng ngày.
- Tra cứu bệnh nhân theo các từ khóa triệu chứng, họ tên, v.v...
- Quản lý loại bệnh.
- Quản lý thuốc (quản lý đơn vị, cách dùng).
- Xem báo cáo thống kê doanh thu theo từng ngày, tháng.
- Xem báo cáo thống kê sử dụng thuốc theo từng ngày, tháng.
- Quản lý các quy định như: số bệnh nhân tối đa khám trong 1 ngày, số tiền khám niêm yết.
- Ngoài ra trang chủ còn hiển thị các thông tin hữu ích cho phòng khám như:
  - Số bệnh nhân đã khám, số phiếu khám, doanh thu trong tháng hiện tại.
  - Biểu đồ doanh thu 7 ngày gần nhất.
  - Loại thuốc được sử dụng nhiều nhất trong tháng.
  - Loại thuốc có số lượng nhiều nhất trong tháng.
## Cách chạy project
- Cài đặt Xampp, Composer trên máy tính
- Tạo database ```quanlyphongkham``` và import file ```quanlyphongkham.sql```trong project vào database
- Chạy lệnh ```composer install```
- Chạy lệnh ```npm install```
- Tạo file env và tạo secret key. Hoặc đơn giản bạn có thể tạo file env có nội dung như thế này 
```
  APP_NAME=Laravel
  APP_ENV=local
  APP_KEY=base64:wu+ZGaROZV31+yXi2FZDSmGiJMrwaXD3cPxcarM38kU=
  APP_DEBUG=true
  APP_LOG_LEVEL=debug
  APP_URL=http://localhost

  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=quanlyphongkham
  DB_USERNAME=root
  DB_PASSWORD=

  BROADCAST_DRIVER=log
  CACHE_DRIVER=file
  SESSION_DRIVER=file
  SESSION_LIFETIME=120
  QUEUE_DRIVER=sync

  REDIS_HOST=127.0.0.1
  REDIS_PASSWORD=null
  REDIS_PORT=6379

  MAIL_DRIVER=smtp
  MAIL_HOST=smtp.mailtrap.io
  MAIL_PORT=2525
  MAIL_USERNAME=null
  MAIL_PASSWORD=null
  MAIL_ENCRYPTION=null

  PUSHER_APP_ID=
  PUSHER_APP_KEY=
  PUSHER_APP_SECRET=
  PUSHER_APP_CLUSTER=mt1

```
- Chạy project bằng câu lệnh ```php artisan serve```
- Mở trang web ở địa chỉ ```localhost:8000``` và đăng nhập bằng tài khoản: yenmai477@gmail.com | secret.
