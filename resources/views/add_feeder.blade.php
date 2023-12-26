@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
    
        <div class="col-md-4">

                <div class="py-5 text-center">
                    <form action="{{route('add_feeder')}}" method="POST">
                        @csrf 
                        <div class="form-group">
                            <label for="station">المحطة</label>
                            <select name="station" id="station" class="form-select shadow-sm">
                                <option @if(old('station') == '') selected @endif value=""></option>
                                <option @if(old('station') == 'الليث') selected @endif value="الليث">الليث</option>
                                <option @if(old('station') == 'الصواملة') selected @endif value="الصواملة">الصواملة</option>
                                <option @if(old('station') == 'اضم') selected @endif value="اضم">اضم</option>
                                <option @if(old('station') == 'الشعيبة 1') selected @endif value="الشعيبة 1">الشعيبة 1</option>
                                <option @if(old('station') == 'الشعيبة 3') selected @endif value="الشعيبة 3">الشعيبة 3</option>
                                <option @if(old('station') == 'ثقيف') selected @endif value="ثقيف">ثقيف</option>
                            </select>
                        </div>

                        <div id="1_div" class="form-group py-3">
                            <label for="allaith">رقم المغذي</label>
                            <select id="allaith" name="allaith" class="form-select shadow-sm text-center">
                                <option value="" @if(old('allaith') == '') selected @endif></option>
                                <option value="4" @if(old('allaith') == 4) selected @endif>4</option>
                                <option value="5" @if(old('allaith') == 5) selected @endif>5</option>
                                <option value="6" @if(old('allaith') == 6) selected @endif>6</option>
                                <option value="7" @if(old('allaith') == 7) selected @endif>7</option>
                                <option value="8" @if(old('allaith') == 8) selected @endif>8</option>
                                <option value="9" @if(old('allaith') == 9) selected @endif>9</option>
                                <option value="11" @if(old('allaith') == 11) selected @endif>11</option>
                                <option value="12" @if(old('allaith') == 12) selected @endif>12</option>
                                <option value="13" @if(old('allaith') == 13) selected @endif>13</option>
                                <option value="14" @if(old('allaith') == 14) selected @endif>14</option>
                                <option value="15" @if(old('allaith') == 15) selected @endif>15</option>
                                <option value="21" @if(old('allaith') == 21) selected @endif>21</option>
                                <option value="22" @if(old('allaith') == 22) selected @endif>22</option>
                                <option value="23" @if(old('allaith') == 23) selected @endif>23</option>
                                <option value="24" @if(old('allaith') == 24) selected @endif>24</option>
                                <option value="28" @if(old('allaith') == 28) selected @endif>28</option>
                                <option value="29" @if(old('allaith') == 29) selected @endif>29</option>
                                <option value="30" @if(old('allaith') == 30) selected @endif>30</option>
                                <option value="31" @if(old('allaith') == 31) selected @endif>31</option>
                                <option value="32" @if(old('allaith') == 32) selected @endif>32</option>
                                <option value="33" @if(old('allaith') == 33) selected @endif>33</option>
                                <option value="34" @if(old('allaith') == 34) selected @endif>34</option>
                                <option value="35" @if(old('allaith') == 35) selected @endif>35</option>
                                <option value="39" @if(old('allaith') == 39) selected @endif>39</option>
                                <option value="40" @if(old('allaith') == 40) selected @endif>40</option>
                                <option value="41" @if(old('allaith') == 41) selected @endif>41</option>
                                <option value="42" @if(old('allaith') == 42) selected @endif>42</option>
                                <option value="43" @if(old('allaith') == 43) selected @endif>43</option>
                                <option value="45" @if(old('allaith') == 45) selected @endif>45</option>
                                <option value="46" @if(old('allaith') == 46) selected @endif>46</option>
                                <option value="47" @if(old('allaith') == 47) selected @endif>47</option>
                                <option value="48" @if(old('allaith') == 48) selected @endif>48</option>
                                <option value="49" @if(old('allaith') == 49) selected @endif>49</option>
                                <option value="50" @if(old('allaith') == 50) selected @endif>50</option>
                            </select>
                        </div>
                        <div id="2_div" class="form-group py-3">
                            <label for="alsawamla">رقم المغذي</label>
                            <select id="alsawamla" name="alsawamla" class="form-select shadow-sm text-center">
                                <option value="" @if(old('alsawamla') == '') selected @endif></option>
                                <option value="110" @if(old('alsawamla') == '110') selected @endif>110</option>
                                <option value="12" @if(old('alsawamla') == '12') selected @endif>12</option>
                                <option value="3" @if(old('alsawamla') == '3') selected @endif>3</option>
                                <option value="121" @if(old('alsawamla') == '121') selected @endif>121</option>
                                <option value="28" @if(old('alsawamla') == '28') selected @endif>28</option>
                                <option value="13" @if(old('alsawamla') == '13') selected @endif>13</option>
                                <option value="123" @if(old('alsawamla') == '123') selected @endif>123</option>
                                <option value="14" @if(old('alsawamla') == '14') selected @endif>14</option>
                                <option value="21" @if(old('alsawamla') == '21') selected @endif>21</option>
                                <option value="106" @if(old('alsawamla') == '106') selected @endif>106</option>
                                <option value="20" @if(old('alsawamla') == '20') selected @endif>20</option>
                                <option value="125" @if(old('alsawamla') == '125') selected @endif>125</option>
                                <option value="23" @if(old('alsawamla') == '23') selected @endif>23</option>
                                <option value="108" @if(old('alsawamla') == '108') selected @endif>108</option>
                                <option value="107" @if(old('alsawamla') == '107') selected @endif>107</option>
                                <option value="109" @if(old('alsawamla') == '109') selected @endif>109</option>
                                <option value="120" @if(old('alsawamla') == '120') selected @endif>120</option>
                                <option value="24" @if(old('alsawamla') == '24') selected @endif>24</option>
                                <option value="19" @if(old('alsawamla') == '19') selected @endif>19</option>
                                <option value="4" @if(old('alsawamla') == '4') selected @endif>4</option>
                                <option value="5" @if(old('alsawamla') == '5') selected @endif>5</option>
                                <option value="122" @if(old('alsawamla') == '122') selected @endif>122</option>
                                <option value="124" @if(old('alsawamla') == '124') selected @endif>124</option>
                                <option value="111" @if(old('alsawamla') == '111') selected @endif>111</option>
                            </select>
                        </div>
                        <div id="3_div" class="form-group py-3">
                            <label for="adham">رقم المغذي</label>
                            <select id="adham" name="adham" class="form-select shadow-sm text-center">
                                <option value="" @if(old('adham') == '') selected @endif></option>
                                <option value="4" @if(old('adham') == '4') selected @endif>4</option>
                                <option value="5" @if(old('adham') == '5') selected @endif>5</option>
                                <option value="6" @if(old('adham') == '6') selected @endif>6</option>
                                <option value="7" @if(old('adham') == '7') selected @endif>7</option>
                                <option value="8" @if(old('adham') == '8') selected @endif>8</option>
                                <option value="9" @if(old('adham') == '9') selected @endif>9</option>
                                <option value="10" @if(old('adham') == '10') selected @endif>10</option>
                                <option value="23" @if(old('adham') == '23') selected @endif>23</option>
                                <option value="24" @if(old('adham') == '24') selected @endif>24</option>
                                <option value="25" @if(old('adham') == '25') selected @endif>25</option>
                                <option value="27" @if(old('adham') == '27') selected @endif>27</option>
                                <option value="28" @if(old('adham') == '28') selected @endif>28</option>
                                <option value="29" @if(old('adham') == '29') selected @endif>29</option>
                                <option value="30" @if(old('adham') == '30') selected @endif>30</option>
                            </select>
                        </div>
                        <div id="4_div" class="form-group py-3">
                            <label for="alshuaiba1">رقم المغذي</label>
                            <select id="alshuaiba1" name="alshuaiba1" class="form-select shadow-sm text-center">
                                <option value="" @if(old('alshuaiba1') == '') selected @endif></option>
                                <option @if(old('alshuaiba1') == '1') selected @endif value="1">1</option>
                                <option @if(old('alshuaiba1') == '13') selected @endif value="13">13</option>
                            </select>
                        </div>
                        <div id="5_div" class="form-group py-3">
                            <label for="alshuaiba3">رقم المغذي</label>
                            <select id="alshuaiba3" name="alshuaiba3" class="form-select shadow-sm text-center">
                                <option value="" @if(old('alshuaiba3') == '') selected @endif></option>
                                <option @if(old('5') == 'alshuaiba3') selected @endif value="15">15</option>
                                <option @if(old('5') == 'alshuaiba3') selected @endif value="6">6</option>
                                <option @if(old('5') == 'alshuaiba3') selected @endif value="5">5</option>
                            </select>
                        </div>
                        <div id="6_div" class="form-group py-3">
                            <label for="thaqeef">رقم المغذي</label>
                            <select id="thaqeef" name="thaqeef" class="form-select shadow-sm text-center">
                                <option value="" @if(old('thaqeef') == '') selected @endif></option>
                                <option @if(old('thaqeef') == '17') selected @endif value="17">17</option>
                            </select>
                        </div>

                        <script>

                            // $("#station").prop("selectedIndex", -1)
                            $('#1_div').hide();
                            $('#2_div').hide();
                            $('#3_div').hide();
                            $('#4_div').hide();
                            $('#5_div').hide();
                            $('#6_div').hide();
                            var mo = jQuery('#station');
                            var mov = this.value;
                            mo.change(function() {
                                    $('#1_div').hide();
                                    $('#2_div').hide();
                                    $('#3_div').hide();
                                    $('#4_div').hide();
                                    $('#5_div').hide();
                                    $('#6_div').hide();
                                if ($(this).val() == 'الليث') {
                                    $('#1_div').show();
                                }
                                else if($(this).val() == 'الصواملة') {
                                    $('#2_div').show();
                                }
                                else if($(this).val() == 'اضم') {
                                    $('#3_div').show();
                                }
                                else if($(this).val() == 'الشعيبة 1') {
                                    $('#4_div').show();
                                }
                                else if($(this).val() == 'الشعيبة 3') {
                                    $('#5_div').show();
                                }
                                else if($(this).val() == 'ثقيف') {
                                    $('#6_div').show();
                                }
                            });
                        </script>

                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-success shadow-sm">التالي</button>
                            <a href="{{route('feeders')}}" class="btn btn-danger">عودة</a>
                        </div>

                    </form>
                </div>

        </div>

    </div>
</div>
@endsection
