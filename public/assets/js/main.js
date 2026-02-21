(() => {
    const app = {
        students: [], currentStudenIndex: 0, pStudentElement: document.querySelector('.currentStudent'),
        init() {
            this.addEventListeners();
        },
        pushCheckedStudents() {
            const studentLabelListElements = document.querySelectorAll('input[type=checkbox]:checked+label');
            this.students = [];
            for (const studentLabelListElement of studentLabelListElements) {
                this.students.push(studentLabelListElement.textContent);
            }
        },
        showRadonStudentBtn() {
            document.querySelector('.randomStudentBtn').classList.remove('hidden');
        },
        takeAndDisplayCurrentStudent() {
            if (this.currentStudenIndex === this.students.length) {
                this.currentStudenIndex = 0;
                this.shuffle();
            }
            this.displayStudent();
            this.currentStudenIndex++;
        },
        takeAttendance(evt) {
            evt.preventDefault();
            this.pushCheckedStudents();
            this.shuffle();
            this.showRadonStudentBtn();
        }, addEventListeners() {
            document.querySelector('form').addEventListener('submit', (evt) => {
                this.takeAttendance(evt);
            });

            document.querySelector('.randomStudentBtn').addEventListener('click', () => {
                this.takeAndDisplayCurrentStudent();
            });
        },

        displayStudent() {
            this.pStudentElement.classList.remove('hidden');
            this.pStudentElement.textContent = this.students[this.currentStudenIndex];
        },

        shuffle() {
            console.log(this);
            for (let i = 0; i < this.students.length; i++) {
                const randomStudentIDX = Math.floor(Math.random() * this.students.length);

                [this.students[i], this.students[randomStudentIDX]] = [this.students[randomStudentIDX], this.students[i]];
            }
        }
    };
    app.init();
})();