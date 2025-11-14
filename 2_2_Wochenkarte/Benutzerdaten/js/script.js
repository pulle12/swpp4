function validateExamDate(birthday) {
    let today = new Date();
    today.setHours(0, 0, 0, 0);

    let birthdaydate = new Date(birthday.value);
    examDate.setHours(0, 0, 0, 0);

    if (birthdaydate < today) {
        elem.classList.add("is-valid");
        elem.classList.remove("is-invalid");
    } else {
        elem.classList.add("is-invalid");
        elem.classList.remove("is-valid");
    }

}