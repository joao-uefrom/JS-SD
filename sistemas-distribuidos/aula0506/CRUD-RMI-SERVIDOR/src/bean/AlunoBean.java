package bean;

import dao.AlunoDAO;
import interfaces.InterfaceAluno;
import java.rmi.RemoteException;
import java.rmi.server.UnicastRemoteObject;
import java.util.ArrayList;

public class AlunoBean extends UnicastRemoteObject implements InterfaceAluno {

    private int id;
    private String nome;
    private int matricula;
    private double media;

    public AlunoBean() throws RemoteException {
        System.out.println("A classe Aluno está disponível remotamente.");
    }

    @Override
    public int getId() {
        return id;
    }

    @Override
    public void setId(int id) {
        this.id = id;
    }

    @Override
    public String getNome() {
        return nome;
    }

    @Override
    public void setNome(String nome) {
        this.nome = nome;
    }

    @Override
    public int getMatricula() {
        return matricula;
    }

    @Override
    public void setMatricula(int matricula) {
        this.matricula = matricula;
    }

    @Override
    public double getMedia() {
        return media;
    }

    @Override
    public void setMedia(double media) {
        this.media = media;
    }

    @Override
    public void adicionar() {
        AlunoDAO.insert(this);
    }

    @Override
    public ArrayList<AlunoBean> listar() {
        return AlunoDAO.select();
    }

    @Override
    public void excluir(int id) {
        AlunoDAO.delete(id);
    }

}
