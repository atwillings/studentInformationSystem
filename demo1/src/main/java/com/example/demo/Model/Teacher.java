package com.example.demo.Model;

public class Teacher {

    private int TeacherID;
    private String TeacherName;

    public Teacher(int TeacherID, String TeacherName) {
        this.TeacherID = TeacherID;
        this.TeacherName = TeacherName;
    }

    public int getId() {
        return TeacherID;
    }

    public void setId(int id) {
        this.TeacherID = id;
    }

    public String getTeacherName() {
        return TeacherName;
    }

    public void setTeacherName(String teacherName) {
        this.TeacherName = teacherName;
    }
}
