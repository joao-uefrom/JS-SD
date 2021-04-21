package dao;

import bean.GameBean;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

public class GameDAO {

    public static void insert(GameBean game) {
        String sql = "INSERT INTO game(nome, ano, nota) VALUES (?, ?, ?)";

        try {
            Connection conexao = ConexaoDB.retornaConexao();
            PreparedStatement stmt = conexao.prepareStatement(sql);

            stmt.setString(1, game.getNome());
            stmt.setInt(2, game.getAno());
            stmt.setDouble(3, game.getNota());

            stmt.execute();

        } catch (Exception e) {
            System.out.println("Erro na função INSERT: " + e.toString());
        }
    }

    public static ArrayList<GameBean> select() {
        ArrayList<GameBean> games = new ArrayList<>();

        String sql = "SELECT * FROM game";

        try {
            Connection conexao = ConexaoDB.retornaConexao();
            PreparedStatement stmt = conexao.prepareStatement(sql);

            ResultSet result = stmt.executeQuery();

            while (result.next()) {
                GameBean temporario = new GameBean();
                
                temporario.setId(result.getInt("id"));
                temporario.setNome(result.getString("nome"));
                temporario.setAno(result.getInt("ano"));
                temporario.setNota(result.getDouble("nota"));
                games.add(temporario);
            }

            return games;

        } catch (Exception e) {
            System.err.println("Erro na função SELECT: " + e.toString());
        }
        return null;
    }

    public void update() {
    }

    public static void delete(int id) {
        String sql = "DELETE FROM game WHERE id = ?";

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
