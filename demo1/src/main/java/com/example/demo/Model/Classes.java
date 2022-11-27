package com.example.demo.Model;

public class Classes {
    int studentID;
    int ClassID;
    char Grade;

    public Classes() {
    }

    public int getStudentID() {
        return studentID;
    }

    public void setStudentID(int studentID) {
        this.studentID = studentID;
    }

    public int getClassID() {
        return ClassID;
    }

    public void setClassID(int classID) {
        ClassID = classID;
    }

    public char getGrade() {
        return Grade;
    }

    public void setGrade(char grade) {
        Grade = grade;
    }

    public Classes(int studentID, int classID, char grade) {
        this.studentID = studentID;
        this.ClassID = classID;
        this.Grade = grade;
    }

    @Override
    public String toString() {
        return "Classes{" +
                "studentID=" + studentID +
                ", ClassID=" + ClassID +
                ", Grade=" + Grade +
                '}';
    }
}