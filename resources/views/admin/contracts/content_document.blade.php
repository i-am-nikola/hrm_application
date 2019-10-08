@php
$code             = $contract->code ? $contract->code                                           : '';
$signDay          = $contract->sign_date ? $contract->sign_date->format('d')                    : '';
$signMonth        = $contract->sign_date ? $contract->sign_date->format('m')                    : '';
$signYear         = $contract->sign_date ? $contract->sign_date->format('Y')                    : '';
$worker           = $contract->worker->name ? $contract->worker->name                           : '';
$birthday         = $contract->worker->birthday ? $contract->worker->birthday->format('d/m/Y')  : '';
$skill            = $contract->worker->skill ? $contract->worker->skill                         : '';
$permanentAddress = $contract->worker->permanent_address ? $contract->worker->permanent_address : '';
$idNo             = $contract->worker->id_no ? $contract->worker->id_no                         : '';
$issuedOn         = $contract->worker->issued_on ? $contract->worker->issued_on->format('d/m/Y'): '';
$issuedBy         = $contract->worker->issued_by ? $contract->worker->issued_by                 : '';
$contractType     = $contract->contractType->name ? $contract->contractType->name               : '';
$effectiveDate    = $contract->effective_date ? $contract->effective_date->format('d/m/Y')      : '';
$effectiveDay     = $contract->effective_date ? $contract->effective_date->format('d')          : '';
$effectiveMonth   = $contract->effective_date ? $contract->effective_date->format('m')          : '';
$effectiveYear    = $contract->effective_date ? $contract->effective_date->format('Y')          : '';
$expiryDate       = $contract->expiry_date ? $contract->expiry_date->format('d/m/Y')            : '';
$position         = $contract->worker->position ? $contract->worker->position                   : '';
$salary           = $contract->salary ? $contract->salary                                       : '';
@endphp

<div class="page">
  <div class="header">
    <div class="logo"> <b>CÔNG TY CỔ PHẦN</b> <br />
      <u><b>PHÁT TRIỂN CÔNG NGHỆ</b></u></div>
    <div class="quochieu"><b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b> <br />
      <u><i>Độc lập - Tự do - Hạnh phúc</i></u></div>
  </div>
  <div class="number_day">
    <div class="number">Số: {{ $code }}</div>
    <div class="day"> "Đà Nẵng, ngày {{ $signDay }} tháng {{ $signMonth }} năm {{ $signYear }}"</div>
  </div>
  <br />
  <br />
  <div class="title">
    <b>HỢP ĐỒNG LAO ĐỘNG</b>
    <br />
    <span style="font-size:13pt;">(Ban hành kèm theo TT số 21/2013/TT-BLĐTBXH ngày 22/09/2003 <br />
      của Bộ Lao động - Thương binh và Xã hội)</span>
  </div>
  <br />
  <table class="TableData">
    <tr>
      <td colspan="6">Chúng tôi:</td>
    </tr>
    <tr>
      <td width="27%">Ông (Bà):</td>
      <td colspan="3" style="text-transform:uppercase;"><b>Nguyễn Hồng Dững</b></td>
      <td width="29%">Quốc tịch: Việt Nam</td>
    </tr>
    <tr>
      <td>Chức vụ:</td>
      <td colspan="5">Tổng giám đốc</td>
    </tr>
    <tr>
      <td>Đại diện cho:</td>
      <td colspan="3">Công ty CP Phát triển công nghệ</td>
      <td>Điện thoại: 0123456789</td>
    </tr>
    <tr>
      <td>Địa chỉ:</td>
      <td colspan="5">Đường số 1, KCN Thanh Vinh, huyện Hòa Vang, TP. Đà Nẵng</td>
    </tr>
    <tr>
      <td>Một bên là Ông (Bà):</td>
      <td colspan="3" style="text-transform:uppercase;">
        <b>{{ $worker }}</b></td>
      <td>Quốc tịch: Việt Nam</td>
    </tr>
    <tr>
      <td>Sinh ngày:</td>
      <td colspan="5">{{ $birthday }}</td>
    </tr>
    <tr>
      <td>Nghề nghiệp:</td>
      <td colspan="5">{{ $skill }}</td>
    </tr>
    <tr>
      <td>Địa chỉ thường trú:</td>
      <td colspan="5">{{ $permanentAddress }}</td>
    </tr>
    <tr>
      <td>Số CMND:</td>
      <td width="16%">{{ $idNo }}</td>
      <td colspan="2">Cấp ngày: {{ $issuedOn }}</td>
      <td>Tại: {{ $issuedBy }}</td>
    </tr>
    <tr>
      <td>Số sổ lao động:</td>
      <td></td>
      <td colspan="2">Cấp ngày: </td>
      <td>Tại: </td>
    </tr>
    <tr>
      <td colspan="6">Thỏa thuận ký kết hợp đồng lao động và cam kết làm đúng những điều khoản sau đây:</td>
    </tr>
  </table>
  <br />
  <table class="TableData">
    <tr>
      <td colspan="3"><b><u>Điều 1.</u> Thời hạn công việc hợp đồng.</b></td>
    </tr>
    <tr>
      <td width="7%">1.1</td>
      <td width="39%">Loại hợp đồng lao động:</td>
      <td width="54%">{{ $contractType }}</td>
    </tr>
    <tr>
      <td>1.2</td>
      <td>Từ ngày: {{ $effectiveDate }}</td>
      <td>đến ngày: {{ $expiryDate }}</td>
    </tr>
    <tr>
      <td>1.3</td>
      <td>Địa điểm làm việc:</td>
      <td>Công ty CP Phát triển công nghệ</td>
    </tr>
    <tr>
      <td>1.4</td>
      <td>Chức danh chuyên môn:</td>
      <td>{{ $position }}</td>
    </tr>
    <td>1.5</td>
    <td>Công việc phải làm:</td>
    <td>Theo sự chỉ đạo của ban lãnh đạo công ty</td>
    </tr>
    </tr>
    <td colspan="3"><b><u>Điều 2.</u> Chế độ làm việc.</b></td>
    </tr>
    </tr>
    <td>2.1</td>
    <td>Thời giờ làm việc:</td>
    <td>8 giờ/ngày (theo quy định của Công ty và pháp</td>
    </tr>
    </tr>
    <td></td>
    <td colspan="2">luật)</td>

    </tr>
    </tr>
    <td>2.2</td>
    <td>Được cấp những dụng cụ làm việc:</td>
    <td>Theo yêu cầu công việc thực tế</td>
    </tr>
    </tr>
    <td colspan="3"><b><u>Điều 3.</u> Nghĩa vụ và quyền lợi của Người lao động.</b></td>
    </tr>
    </tr>
    <td><b><i>3.1</i></b></td>
    <td colspan="2"><b><i>Quyền lợi:</i></b></td>
    </tr>
    </tr>
    <td>3.1.1</td>
    <td>Phương tiện đi lại làm việc:</td>
    <td>Người lao động tự lo.</td>
    </tr>
    </tr>
    <td>3.1.2</td>
    <td>Mức lương chính hoặc tiền công:</td>
    <td>{{ $salary }}</td>
    </tr>
    </tr>
    <td>3.1.3</td>
    <td>Hình thức trả lương:</td>
    <td>Tiền mặt hoặc chuyển khoản (bằng VNĐ).</td>
    </tr>
    </tr>
    <td>3.1.4</td>
    <td>Phụ cấp gồm:</td>
    <td>Theo quy định của Công ty.</td>
    </tr>
    </tr>
    <td>3.1.5</td>
    <td>Được trả lương vào các ngày:</td>
    <td>02 lần/tháng: Lương ứng ngày 5, lương còn lại </td>
    </tr>
    </tr>
    <td></td>
    <td colspan="2">vào ngày 15 của tháng kế tiếp.</td>
    </tr>
    </tr>
    <td>3.1.6</td>
    <td>Tiền thưởng:</td>
    <td>Theo quy định của công ty.</td>
    </tr>
    </tr>
    <td>3.1.7</td>
    <td>Chế độ nâng lương:</td>
    <td>Theo quy định của Công ty và phù hợp với quy</td>
    </tr>
    </tr>
    <td></td>
    <td colspan="2">định của pháp luật hiện hành.</td>
    </tr>
    </tr>
    <td>3.1.8</td>
    <td>Được trang bị bảo hộ lao động:</td>
    <td>Quần, áo, giày, mũ và các trang bị khác phù </td>
    </tr>
    </tr>
    <td></td>
    <td colspan="2">hợp với công việc được giao.</td>
    </tr>
  </table>
</div>
<div class="page">
  <table>
    <tr>
      <td>3.1.9</td>
      <td colspan="2">Chế độ nghỉ ngơi: Theo quy định của Công ty và phù hợp với quy định của pháp</td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2">luật hiện hành.</td>
    </tr>
    <tr>
      <td>3.1.10</td>
      <td colspan="2">Bảo hiểm xã hội, bảo hiêm y tế: Theo quy định hiện hành của pháp luật.</td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2">Người sử dụng lao động: BHXH <b>17%</b>; BHYT <b>3%</b>; BHTN <b>1%</b>; BHTNLĐ-BNN <b>0,5%</b>
      </td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2">Người lao động: BHXH <b>8%</b>; BHYT <b>1,5%</b>; BHTN <b>1%</b>; BHTNLĐ-BNN <b>0%</b></td>
    </tr>
    <tr>
      <td>3.1.11</td>
      <td colspan="2">Chế độ đào tạo: Theo nhu cầu thực tế tại vị trí làm việc được giao.</td>
    </tr>
    <tr>
      <td>3.1.12</td>
      <td colspan="2">Những thỏa thuận khác: Không.</td>
    </tr>
    <tr>
      <td><b><i>3.2</i></b></td>
      <td colspan="2"><b><i>Nghĩa vụ:</i></b></td>
    </tr>
    <tr>
      <td>3.2.1</td>
      <td colspan="2">Hoàn thành những công việc đã cam kết trong hợp đồng lao động.</td>
    </tr>
    <tr>
      <td>3.2.2</td>
      <td colspan="2">Chấp hành lệnh điều hành sản xuất - kinh doanh, nội quy kỷ luật lao động, </td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2">an toàn lao động</td>
    </tr>
    <tr>
      <td>3.2.3</td>
      <td colspan="2">Bồi thường vi phạm và vật chất: Theo nội quy kỷ luật của Công ty và phù hợp </td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2">với quy định pháp luật hiện hành.</td>
    </tr>
    <tr>
      <td colspan="3"><b><u>Điều 4.</u> Nghĩa vụ và quyền hạn của Người sử dụng lao động.</b></td>
    </tr>
    <tr>
      <td><b><i>4.1</i></b></td>
      <td colspan="2"><b><i>Nghĩa vụ:</i></b></td>
    </tr>
    <tr>
      <td>4.1.1</td>
      <td colspan="2">Bảo đảm việc làm và thực hiện đầy đủ những điều đã cam kết trong hợp đồng lao </td>
    </tr>
    </tr>
    <td></td>
    <td colspan="2">động.</td>
    </tr>
    <tr>
      <td>4.1.2</td>
      <td colspan="2">Thanh toán đầy đủ, đúng thời hạn các chế độ và quyền lợi cho Người lao động </td>
    </tr>
    </tr>
    <td></td>
    <td colspan="2">theo hợp đồng lao động, thỏa ước lao động tập thể (nếu có).</td>
    </tr>
    <tr>
      <td><b><i>4.2</i></b></td>
      <td colspan="2"><b><i>Nghĩa vụ:</i></b></td>
    </tr>
    </tr>
    <td>4.2.1</td>
    <td colspan="2">Điều hành Người lao động hoàn thành công việc theo hợp đồng</td>
    </tr>
    <tr>
      <td>4.2.2</td>
      <td colspan="2">Tạm hoãn, chấm dứt hợp đồng lao động, kỷ luật Người lao động theo quy định </td>
    </tr>
    </tr>
    <td></td>
    <td colspan="2">của pháp luật, thỏa ước lao động tập thể và nội quy lao động của doanh nghiệp.</td>
    </tr>
    </tr>
    <td colspan="3"><b><u>Điều 5.</u> Điều khoản thi hành.</b></td>
    </tr>
    <tr>
      <td>5.1</td>
      <td colspan="2">Những vấn đề về lao động không ghi trong hợp đồng lao động này thì áp dụng </td>
    </tr>
    </tr>
    <td></td>
    <td colspan="2">quy định của thỏa ước tập thể, trường hợp chưa có thỏa ước tập thể thì áp dụng </td>
    </tr>
    </tr>
    <td></td>
    <td colspan="2">quy định của pháp luật lao động.</td>
    </tr>
    <tr>
      <td>5.2</td>
      <td colspan="2">Hợp đồng lao động này được làm thành hai bản có giá trị ngang nhau, mỗi bên </td>
    </tr>
    </tr>
    <td></td>
    <td colspan="2"> giữ một bản và có hiệu lực kể từ ngày {{ $effectiveDay }} tháng {{ $effectiveMonth }} năm {{ $effectiveYear }}. Khi hai bên ký kết </td>
    </tr>
    </tr>
    <td></td>
    <td colspan="2">phụ lục hợp đồng lao động cũng có giá trị như các nội dung của bản hợp đồng lao động này.</td>
    </tr>
    </tr>
    <td colspan="3">.</td>
    </tr>
    </tr>
    <td></td>
    <td colspan="2">Hợp đồng lao động này làm tại Công ty CP Phát triển công nghệ ngày {{ $signDay }} tháng {{ $signMonth }} năm {{ $signYear }}.</td>
    </tr>
    </tr>
    <td colspan="3">.</td>
    </tr>
    </tr>
    <td></td>
    <td><b>NGƯỜI LAO ĐỘNG</b></td>
    <td style="text-align:right;"><b>NGƯỜI SỬ DỤNG LAO ĐỘNG</b></td>
    </tr>
    </tr>
    <td></td>
    <td style="padding-left:50px;"><i>(Ký tên)</i></td>
    <td style="text-align:right; padding-right:90px;"><i>(Ký tên)</i></td>
    </tr>
    </tr>
    <td></td>
    <td style="padding-left:25px;">Ghi rõ họ và tên</td>
    <td style="text-align:right; padding-right:60px;">Ghi rõ họ và tên</td>
    </tr>
  </table>
</div>
