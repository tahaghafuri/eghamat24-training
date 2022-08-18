var DatePicker = function () { };

DatePicker.toJalaali = function (gy, gm, gd) {
    if (Object.prototype.toString.call(gy) === '[object Date]') {
        gd = gy.getDate();
        gm = gy.getMonth() + 1;
        gy = gy.getFullYear();
    }
    return DatePicker.d2j(DatePicker.g2d(gy, gm, gd));
};

DatePicker.toGregorian = function (jy, jm, jd) {
    return DatePicker.d2g(DatePicker.j2d(jy, jm, jd));
};

DatePicker.isValidJalaaliDate = function (jy, jm, jd) {
    return jy >= -61 && jy <= 3177 &&
        jm >= 1 && jm <= 12 &&
        jd >= 1 && jd <= DatePicker.jalaaliMonthLength(jy, jm);
};


DatePicker.isLeapJalaaliYear = function (jy) {
    return DatePicker.jalCal(jy).leap === 0;
};

DatePicker.jalaaliMonthLength = function (jy, jm) {
    if (jm <= 6) return 31;
    if (jm <= 11) return 30;
    if (DatePicker.isLeapJalaaliYear(jy)) return 30;
    return 29;
};

DatePicker.jalCal = function (jy) {
    var breaks = [-61, 9, 38, 199, 426, 686, 756, 818, 1111, 1181, 1210
        , 1635, 2060, 2097, 2192, 2262, 2324, 2394, 2456, 3178
    ]
        , bl = breaks.length
        , gy = jy + 621
        , leapJ = -14
        , jp = breaks[0]
        , jm
        , jump
        , leap
        , leapG
        , march
        , n
        , i;

    if (jy < jp || jy >= breaks[bl - 1])
        throw new Error('Invalid Jalaali year ' + jy);

    for (i = 1; i < bl; i += 1) {
        jm = breaks[i];
        jump = jm - jp;
        if (jy < jm)
            break;
        leapJ = leapJ + DatePicker.div(jump, 33) * 8 + DatePicker.div(DatePicker.mod(jump, 33), 4);
        jp = jm;
    }
    n = jy - jp;

    leapJ = leapJ + DatePicker.div(n, 33) * 8 + DatePicker.div(DatePicker.mod(n, 33) + 3, 4);
    if (DatePicker.mod(jump, 33) === 4 && jump - n === 4)
        leapJ += 1;

    leapG = DatePicker.div(gy, 4) - DatePicker.div((DatePicker.div(gy, 100) + 1) * 3, 4) - 150;

    march = 20 + leapJ - leapG;

    if (jump - n < 6)
        n = n - jump + DatePicker.div(jump + 4, 33) * 33;
    leap = DatePicker.mod(DatePicker.mod(n + 1, 33) - 1, 4);
    if (leap === -1) {
        leap = 4;
    }

    return {
        leap: leap
        , gy: gy
        , march: march
    };
};

DatePicker.j2d = function (jy, jm, jd) {
    var r = DatePicker.jalCal(jy);
    return DatePicker.g2d(r.gy, 3, r.march) + (jm - 1) * 31 - DatePicker.div(jm, 7) * (jm - 7) + jd - 1;
};

DatePicker.d2j = function (jdn) {
    var gy = DatePicker.d2g(jdn).gy
        , jy = gy - 621
        , r = DatePicker.jalCal(jy)
        , jdn1f = DatePicker.g2d(gy, 3, r.march)
        , jd
        , jm
        , k;

    k = jdn - jdn1f;
    if (k >= 0) {
        if (k <= 185) {
            jm = 1 + DatePicker.div(k, 31);
            jd = DatePicker.mod(k, 31) + 1;
            return {
                jy: jy
                , jm: jm
                , jd: jd
            };
        } else {
            k -= 186;
        }
    } else {
        jy -= 1;
        k += 179;
        if (r.leap === 1)
            k += 1;
    }
    jm = 7 + DatePicker.div(k, 30);
    jd = DatePicker.mod(k, 30) + 1;
    return {
        jy: jy
        , jm: jm
        , jd: jd
    };
};

DatePicker.g2d = function (gy, gm, gd) {
    var d = DatePicker.div((gy + DatePicker.div(gm - 8, 6) + 100100) * 1461, 4)
        + DatePicker.div(153 * DatePicker.mod(gm + 9, 12) + 2, 5)
        + gd - 34840408;
    d = d - DatePicker.div(DatePicker.div(gy + 100100 + DatePicker.div(gm - 8, 6), 100) * 3, 4) + 752;
    return d;
};

DatePicker.d2g = function (jdn) {
    var j
        , i
        , gd
        , gm
        , gy;
    j = 4 * jdn + 139361631;
    j = j + DatePicker.div(DatePicker.div(4 * jdn + 183187720, 146097) * 3, 4) * 4 - 3908;
    i = DatePicker.div(DatePicker.mod(j, 1461), 4) * 5 + 308;
    gd = DatePicker.div(DatePicker.mod(i, 153), 5) + 1;
    gm = DatePicker.mod(DatePicker.div(i, 153), 12) + 1;
    gy = DatePicker.div(j, 1461) - 100100 + DatePicker.div(8 - gm, 6);
    return {
        gy: gy
        , gm: gm
        , gd: gd
    };
};

DatePicker.div = function (a, b) {
    return ~~(a / b);
};
DatePicker.mod = function (a, b) {
    return a - ~~(a / b) * b;
};



DatePicker.now = new Date();
DatePicker.nowJ = DatePicker.toJalaali(DatePicker.now.getFullYear(), DatePicker.now.getMonth() + 1, DatePicker.now.getDate());

DatePicker.getDateRangeDays = function (currentDate, endDate) {
    var between = [];
    while (currentDate <= endDate) {
        var gregorian = new Date(currentDate);
        gregorian = {
            gy: gregorian.getFullYear(),
            gm: gregorian.getMonth() + 1,
            gd: gregorian.getDate()
        };
        between.push({
            gregorian: gregorian,
            jalali: DatePicker.toJalaali(gregorian.gy, gregorian.gm, gregorian.gd),
            weekDay: ((new Date(currentDate)).getDay() + 1) % 7
        });
        currentDate.setDate(currentDate.getDate() + 1);
        currentDate.setHours(0, 0, 0, 0);
    }

    var rows = '';
    var i = 0;
    while (i < between.length) {
        rows += '<tr>';
        for (var j = 0; j < 7; j++) {
            if (typeof between[i] != typeof undefined && j == between[i].weekDay) {
                var thisYear = between[i].jalali.jy,
                    thisMonth = (between[i].jalali.jm >= 10) ? between[i].jalali.jm : '0' + between[i].jalali.jm,
                    thisDay = (between[i].jalali.jd >= 10) ? between[i].jalali.jd : '0' + between[i].jalali.jd;
                rows +=
                    '<td>' +
                    '<span class="date-picker-box date-picker-box-default btn-info" data-year="' + thisYear + '" data-month="' + thisMonth + '" data-day="' + thisDay + '">' +
                    between[i].jalali.jd +
                    '</span>' +
                    '</td>';
                i++;
            } else {
                rows += DatePicker.templates.emptyBox;
            }
        }
        rows += '</tr>';
    }
    return rows;
};

DatePicker.dateByMonthDiff = function (monthDiff) {
    var year = DatePicker.nowJ.jy,
        month = DatePicker.nowJ.jm,
        day = DatePicker.nowJ.jd;

    var yearDiff = parseInt(monthDiff / 12);
    monthDiff %= 12;

    year += yearDiff;
    month += monthDiff;

    if (month < 1) {
        year -= 1;
        month += 12;
    } else if (month > 12) {
        year += 1;
        month -= 12;
    }

    return {
        jy: year,
        jm: month,
        jd: day
    };
};

DatePicker.templates = {
    calendar: '<div class="date-picker-header">' +
        '<span class="pull-left date-picker-next glyphicon glyphicon-circle-arrow-right text-info" id="date-picker-next" title="بعد"></span>' +
        '<span class="pull-right date-picker-prev glyphicon glyphicon-circle-arrow-left text-info" id="date-picker-prev" title="قبل"></span>' +
        '<div class="date-picker-title text-info">' +
        '<span class="date-picker-month">TARGET_MONTH_NAME</span>&nbsp;<span class="date-picker-year">TARGET_YEAR</span>' +
        '</div>' +
        '</div>' +
        '<table class="date-picker-calendar">' +
        '<thead>' +
        '<tr>' +
        '<th><span title="شنبه">ش</span></th>' +
        '<th><span title="يکشنبه">ي</span></th>' +
        '<th><span title="دوشنبه">د</span></th>' +
        '<th><span title="سه شنبه">س</span></th>' +
        '<th><span title="چهارشنبه">چ</span></th>' +
        '<th><span title="پنجشنبه">پ</span></th>' +
        '<th><span title="جمعه">ج</span></th>' +
        '</tr>' +
        '</thead>' +
        '<tbody>' +
        'MONTH_DAYS' +
        '</tbody>' +
        '</table>',
    box: '<td>' +
        '<span class="date-picker-box date-picker-box-default btn-info" href="#">DAY_NUMBER</span>' +
        '</td>',
    emptyBox: '<td>&nbsp;</td>'
};

DatePicker.currentInput = null;

DatePicker.createDatePickerElement = function () {
    var datepickerElement = document.createElement('div');
    datepickerElement.className = 'date-picker date-picker-rtl';
    datepickerElement.id = 'date-picker-element';
    return datepickerElement;
};
DatePicker.getDatePickerElement = function () {
    return document.getElementById('date-picker-element');
};

DatePicker.calendarBymonthDiff = function (diff) {
    var calendarTemplate = DatePicker.templates.calendar;


    var jDate = DatePicker.dateByMonthDiff(diff);

    var monthLength = DatePicker.jalaaliMonthLength(jDate.jy, jDate.jm);
    var firstDayOfMonth = DatePicker.toGregorian(jDate.jy, jDate.jm, 1);
    var lastDayOfMonth = DatePicker.toGregorian(jDate.jy, jDate.jm, monthLength);

    var currentDate = new Date(firstDayOfMonth.gy, firstDayOfMonth.gm - 1, firstDayOfMonth.gd);
    var endDate = new Date(lastDayOfMonth.gy, lastDayOfMonth.gm - 1, lastDayOfMonth.gd);


    var monthDays = DatePicker.getDateRangeDays(currentDate, endDate);
    var calendar = calendarTemplate.replace('MONTH_DAYS', monthDays);
    calendar = calendar.replace('TARGET_YEAR', jDate.jy);
    calendar = calendar.replace('TARGET_MONTH_NAME', DatePicker.getMonthNameByNumber(jDate.jm));
    return calendar;
};

DatePicker.dismissDatePicker = function () {
    var elem = DatePicker.getDatePickerElement();
    if (elem !== null) {
        elem.parentNode.removeChild(elem);
        DatePicker.currentInput.classList.remove('date-picker-target');
        DatePicker.isOpen = false;
    }
};

DatePicker.setButtons = function () {
    var boxes = DatePicker.getDatePickerElement().querySelectorAll('.date-picker-box');
    for (var i = 0; i < boxes.length; i++) {
        boxes[i].addEventListener('click', function () {
            DatePicker.currentInput.value = this.getAttribute('data-year') + '-' +
                this.getAttribute('data-month') + '-' +
                this.getAttribute('data-day');
            DatePicker.dismissDatePicker();
        });
    }
};

DatePicker.setChangeMonthButtons = function () {
    var nextMonth = document.getElementById('date-picker-next');
    var prevMonth = document.getElementById('date-picker-prev');
    nextMonth.addEventListener('click', function (evt) {
        DatePicker.changeMonth(1);
    });
    prevMonth.addEventListener('click', function (evt) {
        DatePicker.changeMonth(-1);
    });
};

DatePicker.changeMonth = function (diff) {
    var currentDif = DatePicker.currentInput.getAttribute('diff');
    diff = parseInt(currentDif) + diff;
    DatePicker.currentInput.setAttribute('diff', diff);

    var calendar = DatePicker.calendarBymonthDiff(diff);

    var tempCalendar = document.createElement('div');
    tempCalendar.innerHTML = calendar;
    var newTable = tempCalendar.getElementsByTagName('table')[0].innerHTML;
    var newMonthName = tempCalendar.getElementsByClassName('date-picker-month')[0].innerHTML;
    var newYearName = tempCalendar.getElementsByClassName('date-picker-year')[0].innerHTML;

    var calendarBox = DatePicker.getDatePickerElement();
    calendarBox.getElementsByTagName('table')[0].innerHTML = newTable;
    calendarBox.getElementsByClassName('date-picker-month')[0].innerHTML = newMonthName;
    calendarBox.getElementsByClassName('date-picker-year')[0].innerHTML = newYearName;

    DatePicker.setButtons();
};

DatePicker.getMonthNameByNumber = function (monthNumber) {
    var monthName = '-';
    switch (monthNumber) {
        case 1: {
            monthName = 'فروردین';
            break
        }
        case 2: {
            monthName = 'اردیبهشت';
            break
        }
        case 3: {
            monthName = 'خرداد';
            break
        }
        case 4: {
            monthName = 'تیر';
            break
        }
        case 5: {
            monthName = 'مرداد';
            break
        }
        case 6: {
            monthName = 'شهریور';
            break
        }
        case 7: {
            monthName = 'مهر';
            break
        }
        case 8: {
            monthName = 'آبان';
            break
        }
        case 9: {
            monthName = 'آذر';
            break
        }
        case 10: {
            monthName = 'دی';
            break
        }
        case 11: {
            monthName = 'بهمن';
            break
        }
        case 12: {
            monthName = 'اسفند';
            break
        }
    }
    return monthName;
};

DatePicker.isOpen = false;

DatePicker.showCalendar = function () {
    DatePicker.dismissDatePicker();

    var diff = '0';
    if (DatePicker.currentInput.hasAttribute('diff')) {
        diff = DatePicker.currentInput.getAttribute('diff');
    } else {
        DatePicker.currentInput.setAttribute('diff', diff);
    }

    var calendar = DatePicker.calendarBymonthDiff(diff);

    var calendarBox = DatePicker.createDatePickerElement();
    calendarBox.innerHTML = calendar;
    DatePicker.currentInput.parentNode.appendChild(calendarBox);

    var leftPadding = DatePicker.currentInput.offsetLeft;
    calendarBox.style.left = leftPadding + 'px';

    DatePicker.setButtons();
    DatePicker.setChangeMonthButtons();
    DatePicker.isOpen = true;
};

Element.prototype.DatePicker = function () {
    this.addEventListener('focus', function (evt) {
        evt.preventDefault();
        DatePicker.currentInput = this;
        DatePicker.currentInput.classList.add('date-picker-target');
        DatePicker.showCalendar();
    });
};

NodeList.prototype.DatePicker = function () {
    for (var i = 0; i < this.length; i++) {
        this[i].DatePicker();
    }
};

if (window.jQuery) {
    jQuery.fn.extend({
        DatePicker: function () {
            return this.each(function () {
                this.DatePicker();
            });
        }
    });
}

document.addEventListener('click', function (event) {
    var elem = DatePicker.getDatePickerElement();
    if (elem === null || DatePicker.isOpen !== true) {
        return;
    }
    var isClickInside = elem.contains(event.target) || DatePicker.currentInput.contains(event.target);

    if (!isClickInside) {
        DatePicker.dismissDatePicker();
    }
});