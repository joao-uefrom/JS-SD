package dao;

import bean.AlunoBean;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

public class AlunoDAO {

    public static void insert(AlunoBean aluno) {
        String sql = "INSERT INTO aluno(nome, matricula, media) VALUES (?, ?, ?)";

        try {
            Connection conexao = ConexaoDB.retornaConexao();
            PreparedStatement stmt = conexao.prepareStatement(sql);

            stmt.setString(1, aluno.getNome());
            stmt.setInt(2, aluno.getMatricula());
            stmt.setDouble(3, aluno.getMedia());

            stmt.execute();

        } catch (Exception e) {
            System.out.println("Erro na função INSERT: " + e.toString());
        }
    }

    public static ArrayList<AlunoBean> select() {
        ArrayList<AlunoBean> alunos = new ArrayList<>();

        String sql = "SELECT * FROM aluno";

        try {
            Connection conexao = ConexaoDB.retornaConexao();
            PreparedStatement stmt = conexao.prepareStatement(sql);

            ResultSet result = stmt.executeQuery();

            while (result.next()) {
                AlunoBean temporario = new AlunoBean();
                
                temporario.setId(result.getInt("id"));
                temporario.setNome(result.getString("nome"));
                temporario.setMatricula(result.getInt("matricula"));
                temporario.setMedia(result.getDouble("media"));
                alunos.add(temporario);
            }

            return alunos;

        } catch (Exception e) {
            System.err.println("Erro na função SELECT: " + e.toString());
        }
        return null;
    }

    public void update() {
    }

    public static void delete(int id) {
        String sql = "DELETE FROM aluno WHERE id = ?";

        try {
            Connection conexao = ConexaoDB.retornaConexao();
            PreparedStatement stmt = conexao.prepareStatement(sql);
            stmt.setInt(1, id);
            stmt.execute();
        } catch (Exception e) {
            System.err.println("Erro na função DELETE: " + e.toString());
        }

    }

}
