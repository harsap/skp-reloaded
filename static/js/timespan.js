function timeSpan(fromDate, toDate, format) {
    if (format === null)
        format = "milliseconds";
    var formatsMS = {
        milliseconds: 1,
        seconds: 1000,
        minutes: 1000 * 60,
        hours: 1000 * 60 * 60,
        days: 1000 * 60 * 60 * 24,
        weeks: 1000 * 60 * 60 * 24 * 7,
        months: function(m) {
            var ms = this.days,
                    daysPer = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            return ms * daysPer[m];
        },
        years: function(y) {
            var ms = 1000 * 60 * 60 * 24 * 365;
            //add a day for leap years
            if ((y % 4 == 0 && y % 100 == 0) || y % 400 == 0)
                ms += this.days;
            return ms;
        }
    },
    //get the time difference in milliseconds
    ms = toDate.getTime() - fromDate.getTime(),
            reqFormats = format.split(","),
            isYearReq = (format.indexOf("years") > -1),
            isMonthReq = (format.indexOf("months") > -1),
            result = {};

    if (isYearReq) {
        result["years"] = 0;
        for (var y = fromDate.getFullYear(); y <= toDate.getFullYear(); y++) {
            var yearMS = formatsMS.years(y);
            if (ms >= yearMS) {
                ms -= yearMS;
                result["years"] += 1;
            }
        }
        //use "to" year for calculating decimal
        formatsMS.years = formatsMS.years(toDate.getFullYear());
    }
    if (isMonthReq) {
        result["months"] = 0;
        var month = fromDate.getMonth(),
                year = (result["years"] > 0) ? fromDate.getFullYear() + result["years"] : fromDate.getFullYear();
        for (month; month <= 11; month++) {
            var monthMS = formatsMS.months(month);
            if (month == toDate.getMonth() && year == toDate.getFullYear())
                break;
            else if (ms >= monthMS) {
                ms -= monthMS;
                result["months"] += 1;
            }
            if (month == 12 && year < toDate.getFullYear()) {
                month = 0;
                year++;
            }
        }
        //use "to" month for decimal
        formatsMS.months = formatsMS.months(toDate.getMonth());
    }

    //handle the remaining milliseconds
    for (var f = 0; f < reqFormats.length && reqFormats[0] != ""; f++) {
        var res = (f < reqFormats.length - 1) ? Math.floor(ms / formatsMS[reqFormats[f]]) : ms / formatsMS[reqFormats[f]];
        if (ms > 0)
            result[reqFormats[f]] = (result[reqFormats[f]] >= 0) ? result[reqFormats[f]] += res : res;
        else
            result[reqFormats[f]] = 0;

        ms -= res * formatsMS[reqFormats[f]];
    }
    return result;
}

function getTimeSpans(fromdate, to, format) {
    //alert(fromdate);
    if (fromdate != null && fromdate != '') {
        var from = new Date(fromdate)
        var hasil = timeSpan(from, to, format);
        return hasil.years + "  tahun " /*+hasil.months+" bulan "+hasil.weeks+" minggu "+Math.floor(hasil.days)+" hari "*/
                ;
    } else {
        return "0";
    }

}

function formatCommas(numString) {
    /*var re = /(-?\d+)(\d{3})/;
     while (re.test(numString)) {
     numString = numString.toString().replace(re, "$1.$2");
     }*/
    return numString.toFixed(2);
}
function removekoma(objval) {
    while (objval.indexOf(".") != -1) {
        objval = objval.replace(".", "")
    }
    return objval; //.replace(",", ".");
}
function getTanggal(tgl) {
    // console.log(tgl);
    if (tgl != '-' && tgl != null && tgl != '') {
        var tglarr = tgl.split("-");
        return tglarr[2] + "/" + tglarr[1] + "/" + tglarr[0];
    } else {
        return "";
    }
}
