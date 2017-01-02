package com.luxand.facerecognition;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.luxand.facerecognition.R;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;

/**
 * .
 */
public class Election_List extends Activity{

    private ListView list;
    public ArrayList<String> election = new ArrayList<String>();
    private ArrayAdapter<String> adapter;
    private String user_id;
    

    @Override
    public void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.election_list);

        
        
        user_id = getIntent().getStringExtra("user_id");
        System.out.println("Election List :" +user_id);

        list = (ListView)findViewById(R.id.listView);

        new populate_list().execute();


        list.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                String selected = list.getItemAtPosition(position).toString();
                System.out.println("Selected item "+selected);
                Intent intent = new Intent(getApplicationContext(),Election_Details.class);
                intent.putExtra("election_name",selected);
                intent.putExtra("user_id",user_id);
                startActivity(intent);
                finish();
            }
        });

    }

    @Override
    public void onBackPressed()
    {
        AlertDialog.Builder confirm = new AlertDialog.Builder(this);
        confirm.setTitle("Exit Application");
        confirm.setMessage("Do you want to exit an application?");

        confirm.setPositiveButton("Yes",
                new DialogInterface.OnClickListener() {

                    public void onClick(DialogInterface dialog, int which) {
                        Intent broadcastIntent = new Intent();
                        broadcastIntent.setAction("com.package.ACTION_LOGOUT");
                        sendBroadcast(broadcastIntent);
                        dialog.dismiss();
                        finish();
                    }
                });
        confirm.setNegativeButton("No",
                new DialogInterface.OnClickListener() {

                    public void onClick(DialogInterface dialog, int which) {

                        dialog.dismiss();
                    }
                });
        confirm.show();
    }

    public class populate_list extends AsyncTask<String,String,String> {

        String function = "upcoming_election";
        InputStream is=null;
        String str;

        protected void onPreExecute()
        {

        }

        protected String doInBackground(String ... param)
        {
            HttpClient httpClient =new DefaultHttpClient();
            HttpPost httppost = new HttpPost(Constants.URL+function);

            try
            {
                List<NameValuePair> namevaluepair = new ArrayList<NameValuePair>();
                httppost.setEntity(new UrlEncodedFormEntity(namevaluepair));

                HttpResponse response =httpClient.execute(httppost);
                HttpEntity entity = response.getEntity();
                //	String str = EntityUtils.toString(entity);

                // read content
                is = entity.getContent();

            } catch (Exception e) {

                Log.e("log_tag", "Error in http connection " + e.toString());
            }
            try {
                BufferedReader br = new BufferedReader(
                        new InputStreamReader(is));
                StringBuilder sb = new StringBuilder();
                String line = "";
                while ((line = br.readLine()) != null) {
                    sb.append(line + "\n");
                }
                is.close();
                str = sb.toString();
                System.out.println("Result do in background"+str);


            }
            catch (Exception e) {

                Log.e("log_tag", "Error converting result " + e.toString());
            }
            return str;



        }

        @Override
        protected void onPostExecute(String result) {
            try {

                JSONObject object = new JSONObject(result);
                String success = object.getString("success");
                if(success.equals("true")){
                    JSONArray array1 = object.getJSONArray("upcoming_election");
                    for (int i=0; i<array1.length();i++){
                        JSONObject object2 = array1.getJSONObject(i);
                        String name1 = object2.getString("name");
                        String id = object2.getString("id");
                        String name = id+") "+name1;

                        System.out.println("Election Name is "+name);
                        election.add(name);
                    }
                    System.out.println("list is "+election);
                    adapter  = new ArrayAdapter<String>(Election_List.this, android.R.layout.simple_list_item_1, election);
                    list.setAdapter(adapter);


                }


            } catch (JSONException e) {

                e.printStackTrace();
            }

        }
    }
}
