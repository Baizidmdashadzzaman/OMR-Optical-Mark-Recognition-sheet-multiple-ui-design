@php
  $number_of_questions = 30;
  $questionsPerRow = 15;
  $answarePerRow = 30;
  $options = ['ক', 'খ', 'গ', 'ঘ'];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="blue" />
    <title>OMR quiz exam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table, th, td {
            border:1px solid #df96ac;
        }
        td, th {
            width: 40px;
            height: auto;
            text-align: center;
            vertical-align: middle;
        }
        th{
            background-color: #f7c4df;
        }
        .circle-label {
            width: 25px;
            height: 25px;
            border: 1px solid #df96ac;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            cursor: pointer;
            color: #df96ac;
        }
        .form-check-input {
            display: none;
        }
        .form-check-input:checked + .circle-label {
            background-color: #302a29;
            color: white;
            border-color:#aa697b;
        }
        .form-check{
            padding-left: 0;
        }
    </style>
    <link href='https://fonts.googleapis.com/css?family=Tiro Bangla' rel='stylesheet'>
    <style>
      body {
          font-family: 'Tiro Bangla';
      }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h5 class="text-center">সঠিক উত্তর (শিক্ষক কর্তৃক নির্ধারিত)</h5>
        <div class="row" style="border: 1px solid #df96ac;padding: 10px;border-radius: 5px;">
            <div class="col-md-12">
                <table style="width:100%">
                    @for ($rowStart = 1; $rowStart <= $number_of_questions; $rowStart += $answarePerRow)
                        @php
                            $rowEnd = min($rowStart + $answarePerRow - 1, $number_of_questions);
                        @endphp
                
                        <tr>
                            @for ($i = $rowStart; $i <= $rowEnd; $i++)
                                <th>উত্তর {{ (new \Rakibhstu\Banglanumber\NumberToBangla)->bnNum($i) }}</th>
                            @endfor
                        </tr>
                        <tr>
                            @for ($i = $rowStart; $i <= $rowEnd; $i++)
                                <td>
                                    <div class="d-flex flex-column align-items-center gap-1">
                                        @foreach ($options as $option)
                                            @php $optionId = "a{$i}" . strtolower($option); @endphp
                                            <div class="form-check">
                                                <input class="form-check-input teacher-answer"  type="radio" name="a{{ $i }}" id="{{ $optionId }}">
                                                <label class="circle-label" for="{{ $optionId }}">{{ $option }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            @endfor
                        </tr>
                    @endfor
                </table>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h5 class="text-center">শিক্ষার্থীর উত্তর</h5>
        <div class="row" style="border: 1px solid #df96ac;padding: 10px;border-radius: 5px;">
            <div class="col-md-9">
                <table style="width:100%">
                    @for ($rowStart = 1; $rowStart <= $number_of_questions; $rowStart += $questionsPerRow)
                        @php
                            $rowEnd = min($rowStart + $questionsPerRow - 1, $number_of_questions);
                        @endphp
                
                        <tr>
                            @for ($i = $rowStart; $i <= $rowEnd; $i++)
                                <th>প্রশ্ন {{ (new \Rakibhstu\Banglanumber\NumberToBangla)->bnNum($i) }}</th>
                            @endfor
                        </tr>
                        <tr>
                            @for ($i = $rowStart; $i <= $rowEnd; $i++)
                                <td>
                                    <div class="d-flex flex-column align-items-center gap-1">
                                        @foreach ($options as $option)
                                            @php $optionId = "q{$i}{$option}"; @endphp
                                            <div class="form-check">
                                                <input class="form-check-input student-answer" type="radio" name="q{{ $i }}" id="{{ $optionId }}">
                                                <label class="circle-label" for="{{ $optionId }}">{{ $option }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            @endfor
                        </tr>
                    @endfor
                </table>
            </div>
            <div class="col-md-3" style="border: height: 100%; display: flex; flex-direction: column;">
              <div style="flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                  <div style="flex: 1;">
                      <table style="width:100%; height: 100%;">
                          <tr>
                              <th style="height: 30%;">শিক্ষার্থী আইডি</th>
                          </tr>
                          <tr>
                              <td class="text-center align-middle" style="height: 70%;">
                                  <div class="d-flex flex-column gap-1 h-100 justify-content-center">
                                      <input type="text" class="form-control" name="student_id" placeholder="">
                                  </div>
                              </td>
                          </tr>
                      </table>
                  </div>
          
                  <div style="flex: 1;">
                      <table style="width:100%; height: 100%;">
                          <tr>
                              <th style="height: 30%;">বিষয় কোড</th>
                          </tr>
                          <tr>
                              <td class="text-center align-middle" style="height: 70%;">
                                  <div class="d-flex flex-column gap-1 h-100 justify-content-center">
                                      <input type="text" class="form-control" name="subject_code" placeholder="">
                                  </div>
                              </td>
                          </tr>
                      </table>
                  </div>
              </div>
          
              <div style="flex: 1;">
                  <table style="width:100%; height: 100%;">
                      <tr>
                          <th style="height: 30%;">মোট নম্বর</th>
                      </tr>
                      <tr>
                          <td class="text-center align-middle" style="height: 100%;">
                              <div class="d-flex flex-column gap-1 h-100 justify-content-center"           >
                                <div id="total-marks" class="text-center fw-bold" style="font-size:80px">০</div>
                              </div>
                          </td>
                      </tr>
                  </table>
              </div>
              <div style="padding-top: 5px;">
                 <button type="button" class="btn btn-dark btn-btn-lg btn-block" style="width: 100%;">
                    উত্তর জমা দিন
                 </button>
              </div>
            </div>
        </div>
    </div>
    <br><br><br>

<script>
document.querySelectorAll('.student-answer').forEach(input => {
    input.addEventListener('change', calculateMarks);
});
document.querySelectorAll('.teacher-answer').forEach(input => {
    input.addEventListener('change', calculateMarks);
});
function calculateMarks() {
    let total = 0;

    for (let i = 1; i <= {{ $number_of_questions }}; i++) {
        const correct = document.querySelector(`input[name="a${i}"]:checked`);
        const student = document.querySelector(`input[name="q${i}"]:checked`);

        if (correct && student) {
            const correctLabel = document.querySelector(`label[for="${correct.id}"]`);
            const studentLabel = document.querySelector(`label[for="${student.id}"]`);

            if (correctLabel.textContent.trim() === studentLabel.textContent.trim()) {
                total++;
            }
        }
    }

    //document.getElementById('total-marks').innerText = total;
    document.getElementById('total-marks').innerText = toBanglaDigit(total);
    function toBanglaDigit(number) {
        const engToBn = {'0':'০','1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯'};
        return number.toString().replace(/[0-9]/g, d => engToBn[d]);
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
