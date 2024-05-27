<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'title' => 'Giới thiệu',
                'slug' => 'gioi-thieu',
                'content' => '<p><img alt="" class="sweezy-custom-cursor-default-hover" src="https://mevivu.com/wp-content/uploads/2016/11/logomevivumoi.png" style="height:93px; width:350px" /></p>

                <p><span style="font-size:14px"><span style="color:#3498db"><strong>Mevivu</strong>&nbsp;</span>chuy&ecirc;n lập tr&igrave;nh, thiết kế mọi giao diện website, Mobile App Android, IOS, cam kết chất lượng, kh&ocirc;ng lỗi lầm, bảo h&agrave;nh trọn đời, chăm s&oacute;c v&agrave; hỗ trợ kh&aacute;ch h&agrave;ng tận t&igrave;nh chu đ&aacute;o. Với kinh nghiệm đ&atilde; l&agrave;m hơn&nbsp;<span style="color:#27ae60"><strong>6000 kh&aacute;ch h&agrave;ng</strong>&nbsp;</span>tất cả h&agrave;i l&ograve;ng với đ&agrave; ph&aacute;t triển vượt bậc sau khi &aacute;p dụng c&ocirc;ng nghệ th&ocirc;ng tin Marketing th&agrave;nh c&ocirc;ng.</span></p>

                <h2><span style="color:#3498db"><strong>Tại sao Mevivu ?</strong></span></h2>

                <h3><strong>Tại sao chọn ch&uacute;ng t&ocirc;i</strong></h3>

                <h4><strong>C&aacute;c điểm đặc biệt:</strong></h4>

                <ul>
                    <li>Gi&aacute; th&agrave;nh tốt bậc nhất thị trường l&agrave; điểm đặc biệt của ch&uacute;ng t&ocirc;i với chất lượng cam kết ho&agrave;n hảo.</li>
                    <li>L&agrave;m đa dạng từ code tay thuần đến WordPress, đ&aacute;p ứng mọi giải ph&aacute;p cho c&aacute;c doanh nghiệp, c&aacute; nh&acirc;n. Từ quy m&ocirc; nhỏ đến lớn.</li>
                    <li>Thiết kế mọi giao diện Web v&agrave; Mobile App theo y&ecirc;u cầu, c&oacute; thể giống 100% đến s&aacute;ng tạo ri&ecirc;ng biệt.</li>
                    <li>Trang thiết bị đầy đủ, bao giao source code sạch v&agrave; mới, cam kết tuyệt đối chất lượng v&agrave; bảo h&agrave;nh vĩnh viễn.</li>
                    <li>Hiện thực sản phẩm kh&aacute;ch h&agrave;ng bằng c&aacute;i t&acirc;m, kh&ocirc;ng vẽ vời, chau chuốt sản phẩm ho&agrave;n mĩ</li>
                    <li>Chế độ chăm s&oacute;c m&aacute;t tay, th&acirc;n thiện, hỗ trợ người sử dụng sau b&agrave;n giao chu đ&aacute;o</li>
                    <li>Sản phẩm sử dụng những c&ocirc;ng nghệ mới nhất, xu thế hiện nay, BlockChain, Tr&iacute; tuệ nh&acirc;n tạo, h&ograve;a m&igrave;nh v&agrave;o d&ograve;ng c&aacute;ch mạng 4.0</li>
                    <li>Sẵn s&agrave;ng nghi&ecirc;n cứu t&igrave;m hướng giải quyết mọi vấn đề. Team c&oacute; kiến thức lập tr&igrave;nh đa dạng từ ng&ocirc;n ngữ lập tr&igrave;nh PHP, Javascript, .NET, Java đến c&aacute;c c&ocirc;ng nghệ mới Nodejs, Python, tr&iacute; tuệ nh&acirc;n tạo &hellip;</li>
                </ul>'
            ],
            [
                'title' => 'Điều khoản sử dụng',
                'slug' => 'dieu-khoan-su-dung',
                'content' => '<h2><strong>1. Chấp Nhận Điều Khoản</strong></h2>

                <ul>
                    <li>1.1. Việc truy cập v&agrave; sử dụng trang web &quot;App Ch&agrave;nh Xe&quot; (sau đ&acirc;y gọi l&agrave; &quot;app web&quot;) đồng nghĩa với việc bạn chấp nhận tu&acirc;n thủ tất cả c&aacute;c điều khoản v&agrave; điều kiện được quy định trong t&agrave;i liệu n&agrave;y.</li>
                    <li>1.2. Nếu bạn kh&ocirc;ng đồng &yacute; với bất kỳ điều khoản hoặc điều kiện n&agrave;o trong t&agrave;i liệu n&agrave;y, vui l&ograve;ng ngưng việc sử dụng trang web ngay lập tức.</li>
                </ul>

                <h3><strong>2. Quyền Sở Hữu v&agrave; Sử Dụng</strong></h3>

                <ul>
                    <li>2.1. &quot;App Ch&agrave;nh Xe&quot; l&agrave; chủ sở hữu độc quyền của tất cả nội dung tr&ecirc;n trang web, bao gồm nhưng kh&ocirc;ng giới hạn đến h&igrave;nh ảnh, văn bản, đồ họa, m&atilde; nguồn, v&agrave; dữ liệu.</li>
                    <li>2.2. Bạn kh&ocirc;ng được sao ch&eacute;p, sửa đổi, ph&acirc;n phối hoặc t&aacute;i sử dụng bất kỳ phần n&agrave;o của nội dung trang web m&agrave; kh&ocirc;ng c&oacute; sự cho ph&eacute;p bằng văn bản từ &quot;App Ch&agrave;nh Xe&quot;.</li>
                </ul>

                <h3><strong>3. Sử Dụng Dịch Vụ</strong></h3>

                <ul>
                    <li>3.1. Khi sử dụng dịch vụ tr&ecirc;n trang web, bạn cam kết tu&acirc;n thủ mọi quy định v&agrave; hướng dẫn được cung cấp bởi &quot;App Ch&agrave;nh Xe&quot;.</li>
                    <li>3.2. &quot;App Ch&agrave;nh Xe&quot; c&oacute; quyền từ chối hoặc hủy bỏ quyền sử dụng dịch vụ cho bất kỳ người d&ugrave;ng n&agrave;o nếu họ vi phạm điều khoản v&agrave; điều kiện n&agrave;y.</li>
                </ul>

                <h3><strong>4. Quyền v&agrave; Tr&aacute;ch Nhiệm</strong></h3>

                <ul>
                    <li>4.1. Bạn chịu tr&aacute;ch nhiệm đầy đủ về việc giữ b&iacute; mật th&ocirc;ng tin t&agrave;i khoản v&agrave; mật khẩu của m&igrave;nh.</li>
                    <li>4.2. &quot;App Ch&agrave;nh Xe&quot; kh&ocirc;ng chịu tr&aacute;ch nhiệm đối với mọi hậu quả ph&aacute;t sinh từ việc bạn chia sẻ th&ocirc;ng tin đăng nhập của m&igrave;nh với b&ecirc;n thứ ba.</li>
                </ul>

                <h3><strong>5. Chấm Dứt</strong></h3>

                <ul>
                    <li>5.1. &quot;App Ch&agrave;nh Xe&quot; c&oacute; quyền chấm dứt hoặc tạm ngừng cung cấp dịch vụ m&agrave; kh&ocirc;ng cần th&ocirc;ng b&aacute;o trước nếu bạn vi phạm bất kỳ điều khoản n&agrave;o trong t&agrave;i liệu n&agrave;y.</li>
                    <li>5.2. Bạn c&oacute; quyền chấm dứt việc sử dụng trang web bất cứ l&uacute;c n&agrave;o bằng c&aacute;ch ngưng truy cập v&agrave; sử dụng dịch vụ.</li>
                </ul>

                <h3><strong>6. Thay Đổi Điều Khoản</strong></h3>

                <ul>
                    <li>6.1. &quot;App Ch&agrave;nh Xe&quot; c&oacute; quyền điều chỉnh hoặc thay đổi bất kỳ điều khoản n&agrave;o trong t&agrave;i liệu n&agrave;y m&agrave; kh&ocirc;ng cần th&ocirc;ng b&aacute;o trước. Việc sử dụng tiếp tục của bạn sau bất kỳ sự thay đổi n&agrave;o sẽ được xem l&agrave; sự chấp nhận của bạn đối với những thay đổi đ&oacute;.</li>
                </ul>

                <h3><strong>7. Li&ecirc;n Hệ</strong></h3>

                <ul>
                    <li>7.1. Nếu c&oacute; bất kỳ c&acirc;u hỏi hoặc khiếu nại n&agrave;o li&ecirc;n quan đến điều khoản sử dụng, vui l&ograve;ng li&ecirc;n hệ ch&uacute;ng t&ocirc;i tại [địa chỉ email].</li>
                </ul>

                <p>&nbsp;</p>

                <p><strong><span style="color:#c0392b">Lưu &yacute;: tr&ecirc;n đay chỉ l&agrave; điều khoản mẫu chưa phản &aacute;nh đ&uacute;ng ph&aacute;p l&yacute; m&agrave; bạn cung cấp hoặc chưa cung cấp</span></strong></p>'
            ]
        ]);
    }
}
