package com.example.demo.Model;

public class ClassData {
    int ClassID;
    String Semester;
    String StartDate;
    String EndDate;
    String TeacherName;
    String ClassName;
    int NumCredits;
    int TeacherID;

    public ClassData(int classID, String semester, String startDate, String endDate, String teacherName, String className, int numCredits, int teacherID) {
        ClassID = classID;
        Semester = semester;
        StartDate = startDate;
        EndDate = endDate;
        TeacherName = teacherName;
        ClassName = className;
        NumCredits = numCredits;
        TeacherID = teacherID;
    }

    public int getTeacherID() {
        return TeacherID;
    }

    public void setTeacherID(int teacherID) {
        TeacherID = teacherID;
    }

    public int getClassID() {
        return ClassID;
    }

    public void setClassID(int classID) {
        ClassID = classID;
    }

    public String getSemester() {
        return Semester;
    }

    public void setSemester(String semester) {
        Semester = semester;
    }

    public String getStartDate() {
        return StartDate;
    }

    public void setStartDate(String startDate) {
        StartDate = startDate;
    }

    public String getEndDate() {
        return EndDate;
    }

    public void setEndDate(String endDate) {
        EndDate = endDate;
    }

    public String getTeacherName() {
        return TeacherName;
    }

    public void setTeacherName(String teacherName) {
        TeacherName = teacherName;
    }

    public String getClassName() {
        return ClassName;
    }

    public void setClassName(String className) {
        ClassName = className;
    }

    public int getNumCredits() {
        return NumCredits;
    }

    public void setNumCredits(int numCredits) {
        NumCredits = numCredits;
    }

    @Override
    public String toString() {
        return "ClassData{" +
                "ClassID=" + ClassID +
                ", AcademicYear='" + Semester + '\'' +
                ", StartDate='" + StartDate + '\'' +
                ", EndDate='" + EndDate + '\'' +
                ", TeacherName='" + TeacherName + '\'' +
                ", ClassName='" + ClassName + '\'' +
                ", NumCredits=" + NumCredits +
                '}';
    }
}
