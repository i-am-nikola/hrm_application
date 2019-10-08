@php
$decisionTypeId = $decision->decision_type_id ? $decision->decision_type_id : 1;
$decisionType = $decision->decisionType->name ? $decision->decisionType->name : '';
$code = $decision->code ? $decision->code : '';
$worker = $decision->worker->name ? $decision->worker->name : '';
$birthday = $decision->worker->birthday ? $decision->worker->birthday->format('d/m/Y') : '';
$signDay = $decision->sign_date ? $decision->sign_date->format('d') : '';
$signMonth = $decision->sign_date ? $decision->sign_date->format('m') : '';
$signYear = $decision->sign_date ? $decision->sign_date->format('Y') : '';
$effectiveDate = $decision->effective_date ? $decision->effective_date->format('d/m/Y') : '';
$position = $decision->worker->position ? $decision->worker->position : '';
$department = $decision->worker->department->name ? $decision->worker->department->name : '';
$oldSalary = $decision->old_salary ? $decision->old_salary : '';
$newSalary = $decision->new_salary ? $decision->new_salary : '';
$oldDepartment = $decision->old_department ? $decision->old_department : 1;
$newDepartment = $decision->new_department ? $decision->new_department : 1;
$oldPosition = $decision->old_position ? $decision->old_position : '';
$newPosition = $decision->new_position ? $decision->new_position : '';
$idNo = $decision->worker->id_no ? $decision->worker->id_no : '';
$issuedOn = $decision->worker->issued_on ? $decision->worker->issued_on->format('d/m/Y') : '';
$issuedBy = $decision->worker->issued_by ? $decision->worker->issued_by : '';
$reason = $decision->reason ? $decision->reason : '';
$leavingDate = $decision->leaving_date ? $decision->leaving_date->format('d/m/Y') : '';
$formality = $decision->formality ? $decision->formality : '';
@endphp

<div class="page">
  <div class="header">
    <div class="logo">CÔNG TY CỔ PHẦN <br /><u>PHÁT TRIỂN CÔNG NGHỆ</u></div>

    <div class="quochieu"><b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b>
      <br />
      <u><i>Độc lập - Tự do - Hạnh phúc</i></u>
    </div>
  </div>
  <div class="number_day">
    <div class="number">Số: {{ $code }}</div>
  </div>
  <br />
  <div class="day">
    <i>Đà Nẵng, ngày {{ $signDay }} tháng {{ $signMonth }} năm {{ $signYear }}.</i>
  </div>
  <br />
  <br />
  <div class="title">
    <b>QUYẾT ĐỊNH</b>
    <br />
    <span style="padding:5px;font-size:13pt;"><i>"V/v: {{ $decisionType }}"</i></span>
    <div style="margin:8px auto;width:150px;border-bottom:1px solid #000;"></div>
  </div>
  <div class="foundation">
    <table class="TableData1">
      <tr>
        <td width="22%">- Căn cứ Điều lệ hoạt động của Công ty CP Phát triển công nghệ.</td>
      </tr>
      <tr>
        <td width="22%">- Căn cứ vào chức năng và quyền hạn của Tổng Giám Đốc Công ty.</td>
      </tr>
      @if ($decisionTypeId === 1)
      <tr>
        <td width="22%">- Căn cứ theo bảng lương hiện hành.</td>
      </tr>
      <tr>
        <td width="22%">- Xét tính chất công việc và khả năng hoàn thành công việc của nhân viên.</td>
      </tr>
      @endif
      @if ($decisionTypeId === 2)
      <tr>
        <td width="22%">- Xét yêu cầu công tác, vị trí công tác, năng lực và kinh nghiệm nhân viên.</td>
      </tr>
      <tr>
        <td width="22%">- Theo đề xuất của phòng HCNS.</td>
      </tr>
      @endif
      @if ($decisionTypeId === 3)
      <tr>
        <td width="22%">- Xét yêu cầu công tác, vị trí công tác, năng lực và kinh nghiệm nhân viên.</td>
      </tr>
      <tr>
        <td width="22%">- Căn cứ vào phẩm chất đạo đức, năng lực của ông (bà) {{ $worker }} và nhu cầu của Công ty</td>
      </tr>
      @endif
      @if ($decisionTypeId === 4)
      <tr>
        <td width="22%">- Căn cứ vào tờ trình trao trả nhân sự đối với ông (bà) {{ $worker }} thuộc {{ $department }}.
        </td>
      </tr>
      <tr>
        <td width="22%">- Theo đề nghị của Phòng hành chính nhân sự công ty.</td>
      </tr>
      @endif
      @if ($decisionTypeId === 5)
      <tr>
        <td width="22%">- Căn cứ vào biên bản sự việc.</td>
      </tr>
      @endif
    </table>
  </div>
  <div style="font-size:13pt; line-height:30px;text-align:center;margin-top:20px;"><b>TỔNG GIÁM ĐỐC CÔNG TY CP
      PHÁT TRIỂN CÔNG NGHỆ<br />QUYẾT ĐỊNH</b></div>
  <br />

  <table class="TableData2">
    @if ($decisionTypeId === 1)
    <tr>
      <td width="9%"><b>Điều 1. </b></td>
      <td width="91%">Điều chỉnh lương đối với ông (bà): <b>{{ $worker }}</b></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Sinh ngày {{ $birthday }}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Bộ phận công tác: {{ $department }}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Mức lương hiện tại: {{ $oldSalary }} VNĐ</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Mức lương mới: {{ $newSalary }} VNĐ</td>
    </tr>
    @endif
    @if ($decisionTypeId === 2)
    <tr>
      <td width="9%"><b>Điều 1. </b></td>
      <td width="91%">Điều chuyển nhân sự: <b>{{ $worker }}</b></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Sinh ngày {{ $birthday }}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Hiện đang làm việc tại: {{ getDepartmentNameById($oldDepartment) }}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Được điều chuyển đến làm việc tại: {{ getDepartmentNameById($newDepartment) }}</td>
    </tr>
    @if ($newPosition !== '')
    <tr>
      <td>&nbsp;</td>
      <td>Giữ chức vụ: {{ $newPosition }}</td>
    </tr>
    @endif
    @endif
    @if ($decisionTypeId === 3)
    <tr>
      <td width="9%"><b>Điều 1. </b></td>
      <td width="91%">Bổ nhiệm nhân sự: <b>{{ $worker }}</b></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Sinh ngày {{ $birthday }}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Hiện đang giữ chức vụ: {{ $oldPosition }}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Được bổ nhiệm giữ chức vụ: {{ $newPosition }}</td>
    </tr>
    @endif
    @if ($decisionTypeId === 4)
    <tr>
      <td width="9%"><b>Điều 1. </b></td>
      <td width="91%">Nay chấm dứt HĐLĐ đối với ông (bà): <b>{{ $worker }}</b></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Sinh ngày {{ $birthday }}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Số CMND: {{ $idNo }}, Cấp ngày {{ $issuedOn }}, Tại: {{ $issuedBy }}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Bộ phận công tác: {{ $department }}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Được thôi việc kể từ ngày: {{ $leavingDate }}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Lý do: {{ $reason }}</td>
    </tr>
    @endif
    @if ($decisionTypeId === 5)
    <tr>
      <td width="9%"><b>Điều 1. </b></td>
      <td width="91%">Kỷ luật hành chính đối với nhân sự: <b>{{ $worker }}</b></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Sinh ngày {{ $birthday }}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Bộ phận công tác: {{ $department }}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Lý do: {{ $reason }}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Hình thức kỷ luật: {{ $formality }}</td>
    </tr>
    @endif
    <tr>
      <td width="9%"><b>Điều 2. </b></td>
      @if ($decisionTypeId === 1)
      <td width="91%">Việc điều chỉnh với mức lương mới được áp dụng từ ngày {{ $effectiveDate }}</td>
      @endif
      @if ($decisionTypeId === 2)
      <td width="91%">Thời gian điều chuyển bắt đầu từ ngày {{ $effectiveDate }}</td>
      @endif
      @if ($decisionTypeId === 3)
      <td width="91%">Thời gian bổ nhiệm bắt đầu từ ngày {{ $effectiveDate }}</td>
      @endif
      @if ($decisionTypeId === 4)
      <td width="91%">Ông (bà) {{ $worker }} được giải quyết các ngày công đã làm theo đúng quy định của Công ty và có
        trách nhiệm hoàn trả các khoản nợ công (nếu có)</td>
      @endif
      @if ($decisionTypeId === 5)
      <td width="91%">Thời gian kỷ luật bắt đầu từ ngày {{ $effectiveDate }}</td>
      @endif
    </tr>
    @if ($decisionTypeId !== 4 && $decisionTypeId !== 5)
    <tr>
      <td colspan="2"><b>Điều 3.
        </b>Ông (bà) {{ $worker }}
        có trách nhiệm thực hiện và hoàn thành tốt các công việc được giao.</td>
    </tr>
    <tr>
      <td colspan="2"><b>Điều 4. </b> &nbsp;Các Phòng, Ban, Bộ phận liên quan và ông (bà) {{ $worker }} chịu trách nhiệm
        thi hành quyết định này. </td>
    </tr>
    <tr>
      <td colspan="2"><b>Điều 5. </b> &nbsp;Quyết định này có hiệu lực kể từ ngày ký. </td>
    </tr>
    @endif
    @if ($decisionTypeId === 4)
    <tr>
      <td colspan="2"><b>Điều 3.</b>
        Phòng hành chính nhân sự, Phòng tài chính kế toán, các bộ phận có liên quan và ông (bà) {{ $worker }} có trách
        nhiệm thi hành quyết định này.
      </td>
    </tr>
    <tr>
      <td colspan="2">Quyết định này có hiệu lực kể từ ngày ký.</td>
    </tr>
    @endif
    @if ($decisionTypeId === 5)
    <tr>
      <td colspan="2"><b>Điều 3.</b>
        Phòng hành chính nhân sự, Phòng tài chính kế toán, các bộ phận có liên quan và ông (bà) {{ $worker }} có trách
        nhiệm thi hành quyết định này.
      </td>
    </tr>
    <tr>
      <td colspan="2">Quyết định này có hiệu lực kể từ ngày ký.</td>
    </tr>
    @endif
  </table>
  <table class="TableData2">
    <tr>
      <td width="75%"></td>
      <td width="25%" style="text-align:center;"><b>TỔNG GIÁM ĐỐC</b></td>
    </tr>
    <tr>
      <td width="58%"><i><u>Nơi nhận:</u><br />
          - Ban TGĐ (để báo cáo)<br />
          @if ($decisionTypeId === 4 && $decisionTypeId === 5)
          - Như điều 3.<br />
          @endif
          @if ($decisionTypeId === 1 || $decisionTypeId === 2 || $decisionTypeId === 3)
          - Như điều 4.<br />
          @endif
          - Lưu VT, P. HCNS</i>
      </td>
      <td width="42%"></td>
    </tr>
  </table>
</div>
